<?php
require_once "database.php";
class Movie extends Database{
    public function addMovie($title, $release_year, $runtime, $rating, $st_date, $st_time, $end_date, $photo_name, $tmp_photo_name, $trailer,$feature_image_name, $tmp_feature_image_name, $synopsis,  $categories){
        $sql = "INSERT INTO movies (title, release_year, runtime, rating, st_date, time, end_date, photo, trailer, feature_image, synopsis) VALUES ('$title', '$release_year', '$runtime', '$rating', '$st_date', '$st_time', '$end_date','$photo_name', '$trailer', '$feature_image_name', '$synopsis')";


        if($this->conn->query($sql)){
          
            $destination_photo = "../assets/images/".basename($photo_name);
            $destination_feature_image = "../assets/images/".basename($feature_image_name);

            if(move_uploaded_file($tmp_photo_name, $destination_photo)){
                
                if(move_uploaded_file($tmp_feature_image_name, $destination_feature_image)){

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
                    die("Error uploading a feature image: ".$this->conn->error);
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

    public function getMovieDetailRow($movie_id){
        $sql = "SELECT * FROM movies WHERE movie_id = '$movie_id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            die("Error getting movie row: ".$this->conn->error);
        }
    }

    public function getCategories($movie_id){
        $sql = "SELECT category_name FROM categories INNER JOIN movie_category ON categories.category_id = movie_category.category_id WHERE movie_id = '$movie_id'";
        
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error: ".$this->conn->error);
            exit;
        }
    }

    public function updateMovieAndImage($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_photo_name, $new_tmp_photo_name, $new_trailer, $new_categories, $movie_id, $new_feature_image_name, $new_tmp_feature_image_name, $new_synopsis){
        $sql = "UPDATE movies
                SET title = '$new_title',
                    release_year = '$new_release_year',
                    runtime = '$new_runtime',
                    rating = '$new_rating',
                    st_date = '$new_st_date',
                    time = '$new_st_time',
                    end_date = '$new_end_date',
                    photo = '$new_photo_name',
                    trailer = '$new_trailer',
                    feature_image = '$new_feature_image_name',
                    synopsis = '$new_synopsis'
                WHERE movies.movie_id = '$movie_id'";
        
        if($this->conn->query($sql)){
            $destination_photo = "../assets/images/".basename($new_photo_name);
            $destination_feature_image = "../assets/images/".basename($new_feature_image_name);

            if(move_uploaded_file($new_tmp_photo_name, $destination_photo)){
                
                if(move_uploaded_file($new_tmp_feature_image_name, $destination_feature_image)){

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
                    die("Error uploading a feature image1: ".$this->conn->error);
                }

            }else{
                die("Error uploading a photo1");
            }

        }else{
            die("Error updating a movie: ".$this->conn->error);
        }
    }

    public function updateMovieAndPoster($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_trailer, $new_categories, $movie_id, $new_synopsis, $new_photo_name, $new_tmp_photo_name){
        $sql = "UPDATE movies
                SET title = '$new_title',
                    release_year = '$new_release_year',
                    runtime = '$new_runtime',
                    rating = '$new_rating',
                    st_date = '$new_st_date',
                    time = '$new_st_time',
                    end_date = '$new_end_date',
                    photo = '$new_photo_name',
                    trailer = '$new_trailer',
                    synopsis = '$new_synopsis'
                WHERE movies.movie_id = '$movie_id'";
        
        if($this->conn->query($sql)){
            $destination_photo = "../assets/images/".basename($new_photo_name);

            if(move_uploaded_file($new_tmp_photo_name, $destination_photo)){

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
                die("Error uploading a photo2");
            }

        }else{
            die("Error updating a movie2: ".$this->conn->error);
        }
    }

    public function updateMovieAndFeatureImage($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_trailer, $new_categories, $movie_id, $new_feature_image_name, $new_tmp_feature_image_name, $new_synopsis){
        $sql = "UPDATE movies
                SET title = '$new_title',
                    release_year = '$new_release_year',
                    runtime = '$new_runtime',
                    rating = '$new_rating',
                    st_date = '$new_st_date',
                    time = '$new_st_time',
                    end_date = '$new_end_date',
                    feature_image = '$new_feature_image_name',
                    trailer = '$new_trailer',
                    synopsis = '$new_synopsis'
                WHERE movies.movie_id = '$movie_id'";
        
        if($this->conn->query($sql)){
            $destination_feature_image = "../assets/images/".basename($new_feature_image_name);

            if(move_uploaded_file($new_tmp_feature_image_name, $destination_feature_image)){

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
                die("Error uploading a feature image3");
            }

        }else{
            die("Error updating a movie3: ".$this->conn->error);
        }
    }

    public function uploadMovie($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_trailer, $new_categories, $movie_id, $new_synopsis){
        $sql = "UPDATE movies
                SET title = '$new_title',
                    release_year = '$new_release_year',
                    runtime = '$new_runtime',
                    rating = '$new_rating',
                    st_date = '$new_st_date',
                    time = '$new_st_time',
                    end_date = '$new_end_date',
                    trailer = '$new_trailer',
                    synopsis = '$new_synopsis'
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
            die("Error updating a movie4: ".$this->conn->error);
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


    public function deleteMovie($movie_id){
        $movie_sql = "DELETE FROM movies WHERE movie_id = '$movie_id'";
        $schedule_sql = "DELETE FROM schedule WHERE movie_id = '$movie_id'";
        
        if($this->conn->query($movie_sql)){
            $this->conn->schedule_sql;
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting: ".$this->conn->error);
        }
    }

    public function deleteUpcomingMovie($movie_id){
        $movie_sql = "DELETE FROM movies WHERE movie_id = '$movie_id'";
        $schedule_sql = "DELETE FROM schedule WHERE movie_id = '$movie_id'";
        
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

    public function calculateRanking(){
        $sql = "SELECT movie_id FROM reservations GROUP BY movie_id ORDER BY count(*) DESC LIMIT 3";
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getMovieRanking($movie_id){
        $sql = "SELECT * FROM movies WHERE movie_id = '$movie_id' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows == 1){
            return $result;
        }else{
            die("Error getting movie ranking: ".$this->conn->error);
        }
    }
}
?>