<?php
require_once "database.php";
class Movie extends Database{
    public function addMovie($title, $release_year, $runtime, $rating, $st_date, $st_time, $end_date, $photo_name, $tmp_photo_name, $trailer, $categories){
        $sql = "INSERT INTO movies (title, release_year, runtime, rating, st_date, st_time, end_date, photo, trailer) VALUES ('$title', '$release_year', '$runtime', '$rating', '$st_date', '$st_time', '$end_date','$photo_name', '$trailer')";


        if($this->conn->query($sql)){
          
            $destination = "../images/".basename($photo_name);

            if(move_uploaded_file($tmp_photo_name, $destination)){
                $movie_id = $this->conn->insert_id;
                $this->insertCategory($movie_id, $categories);

                date_default_timezone_set('Asia/Tokyo');
                $timestamp = strtotime("$st_date $st_time");

                if($timestamp > time()){
                    header("location: ../views/upcoming.php");
                    exit;
                }else{
                    header("location: ../views/dashboard.php");
                    exit;
                }
       
            }else{
                die("Error uploading a photo");
            }

        }else{
            die("Error in inserting data: ".$this->conn->error);
        }
    }

    public function insertCategory($movie_id, $categories){
       
        foreach($categories as $category){
            $sql = "INSERT INTO movie_category (movie_id, category_id) VALUES ('$movie_id', '$category')";
            $this->conn->query($sql);
        }

    }


    public function getMovieDetails(){
        $sql = "SELECT * FROM movies";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            while($movie_details = $result->fetch_assoc()){
                $rows[] = $movie_details;
            }
            return $rows;
            
        }else{
            return false;
        }
    }

    public function getMovieDetailRow($id){
        $sql = "SELECT * FROM movies WHERE movie_id = '$id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            die("Error getting a row: ".$this->conn->error);
        }
    }

    public function getCategories($movie_id){
        $sql = "SELECT movie_id, category_name FROM categories INNER JOIN movie_category ON categories.category_id = movie_category.category_id WHERE movie_id = '$movie_id'";
        
        // $movie_sql = "SELECT movie_id FROM movie_category WHERE movie_id = '$movie_id' GROUP BY movie_id";
        // $category_sql = "SELECT category_name FROM categories INNER JOIN movie_category ON categories.category_id = movie_category.category_id  WHERE movie_id = '$movie_sql'";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error: ".$this->conn->error);
            exit;
        }
    }

    public function updateMovieAndImage($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_photo_name, $new_tmp_photo_name, $new_trailer, $new_categories, $movie_id){
        $sql = "UPDATE movies
                SET title = '$new_title',
                    release_year = '$new_release_year',
                    runtime = '$new_runtime',
                    rating = '$new_rating',
                    st_date = '$new_st_date',
                    st_time = '$new_st_time',
                    end_date = '$new_end_date',
                    photo = '$new_photo_name',
                    trailer = '$new_trailer'
                WHERE movies.movie_id = '$movie_id'";
        
        if($this->conn->query($sql)){
            $destination = "../images/".basename($new_photo_name);

            if(move_uploaded_file($new_tmp_photo_name, $destination)){
                $this->updateCategory($movie_id, $new_categories);

                date_default_timezone_set('Asia/Tokyo');
                $timestamp = strtotime("$new_st_date $new_st_time");

                if($timestamp > time()){
                    header("location: ../views/upcoming.php");
                    exit;
                }else{
                    header("location: ../views/dashboard.php");
                    exit;
                }

            }else{
                die("Error uploading a photo");
            }

        }else{
            die("Error updating a movie: ".$this->conn->error);
        }
    }

    public function uploadMovie($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_trailer, $new_categories, $movie_id){
        $sql = "UPDATE movies
                SET title = '$new_title',
                    release_year = '$new_release_year',
                    runtime = '$new_runtime',
                    rating = '$new_rating',
                    st_date = '$new_st_date',
                    st_time = '$new_st_time',
                    end_date = '$new_end_date',
                    trailer = '$new_trailer'
                WHERE movies.movie_id = '$movie_id'";
        
        if($this->conn->query($sql)){
                $this->updateCategory($movie_id, $new_categories);

                date_default_timezone_set('Asia/Tokyo');
                $timestamp = strtotime("$new_st_date $new_st_time");

                if($timestamp > time()){
                    header("location: ../views/upcoming.php");
                    exit;
                }else{
                    header("location: ../views/dashboard.php");
                    exit;
                }

        }else{
            die("Error updating a movie: ".$this->conn->error);
        }
    }

    public function updateCategory($movie_id, $categories){
       
        $sql = "DELETE FROM movie_category WHERE movie_id = '$movie_id'";
        if($this->conn->query($sql)){
            $this->insertCategory($movie_id, $categories);
        }else{
            die("Error updating categories: ".$this->conn->error);
        }
    }


    public function deleteMovie($id){
        $movie_sql = "DELETE FROM movies WHERE movie_id = '$id'";
        $schedule_sql = "DELETE FROM schedule WHERE movie_id = '$id'";
        
        if($this->conn->query($movie_sql)){
            $this->conn->schedule_sql;
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting: ".$this->conn->error);
        }
    }

    public function deleteUpcomingMovie($id){
        $movie_sql = "DELETE FROM movies WHERE movie_id = '$id'";
        $schedule_sql = "DELETE FROM schedule WHERE movie_id = '$id'";
        
        if($this->conn->query($movie_sql)){
            $this->conn->schedule_sql;
            header("location: ../views/upcoming.php");
            exit;
        }else{
            die("Error deleting: ".$this->conn->error);
        }
    }

    public function deleteMovieAutomatic(){
        $today = date("Y-m-d");
        $sql = "DELETE FROM movies WHERE end_date < '$today'";
        if($this->conn->query($sql)){
            return true;
        }else{
            die("Error deleting");
        }
    }
}
?>