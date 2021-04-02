                if(empty($_POST['bd'])){
                $date_birthdateError = "Поле не должно быть пустым";
            }else {
                $date_birthdate = $_POST['bd'];
                if(preg_match("#^([0-9]{2})\.([0-9]{2})\.([0-9]{4})$#", $date_birthdate, $date_birthdateMatches)){
                    if(!checkdate($date_birthdateMatches[2], $date_birthdateMatches[1],$date_birthdateMatches[3])){
                        $date_birthdateError = "Неверный формат даты";
                    } else {
                        $today = strtotime("now");
                        if(strtotime($date_birthdate)>$today){
                            $date_birthdateError = "Date supplied is before present day";
                        }
                        
                    }
                } else{
                    $date_birthdateError = "Неверный формат даты";
                }
