<?php

use product as GlobalProduct;

    class product {
        public $product_id;
        public $product_name;
        public $category_id;
        public $os_id;
        public $os_name;
        public $brand_id;
        public $brand_name;
        public $cpu_brand;
        public $cpu_name;
        public $ram;
        public $screen_type;
        public $screen_size;
        public $battery;
        public $camera;
        public $price;
        public $discount;
        public $create_at;
        public $update_at;
        public $picture;
        public $summary;
        public $content;

        public function show_header() {
            echo "<tr>
                    <td>PRODUCT_ID</td>
                    <td>NAME</td>
                    <td>CATEGORY</td>
                    <td>OS</td>
                    <td>BRAND</td>
                    <td>CPU BRAND</td>
                    <td>CPU NAME</td>
                    <td>RAM</td>
                    <td>SCREEN TYPE</td>
                    <td>SCREEN SIZE</td>
                    <td>BATTERY</td>
                    <td>CAMERA</td>
                    <td>PRICE</td>
                    <td>DISCOUNT</td>
                    <td>CREATE AT</td>
                    <td>UPDATE AT</td>
                </tr>";
        }
        
        public function show_item() {
            echo '<tr>
                    <td>'.$this->product_id.'</td>
                    <td>'.$this->product_name.'</td>
                    <td>'.$this->category_id.'</td>
                    <td>'.$this->os_id.'</td>
                    <td>'.$this->brand_id.'</td>
                    <td>'.$this->cpu_brand.'</td>
                    <td>'.$this->cpu_name.'</td>
                    <td>'.$this->ram.'</td>
                    <td>'.$this->screen_type.'</td>
                    <td>'.$this->screen_size.'</td>
                    <td>'.$this->battery.'</td>
                    <td>'.$this->camera.'</td>
                    <td>'.$this->price.'</td>
                    <td>'.$this->discount.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?editid=product&product_id='.$this->product_id.'&name='.$this->product_name.'&category='.$this->category_id.'&os='.$this->os_id.'&'
                    .'brand='.$this->brand_id.'&cpu_brand='.$this->cpu_brand.'&cpu_name='.$this->cpu_name.'&ram='.$this->ram.'&screen_type='.$this->screen_type.'&screen_size='.$this->screen_size.'&battery='.$this->battery.'&camera='.$this->camera.'&price='.$this->price.'&discount='.$this->discount.'  ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light"  >Delete</a></button></td> 
                </tr>';
        }
        public function show_item_index($num) {     // hien thi thong tin san pham khi hover      
                echo   '<div class=" col-lg-3 col-md-4 col-sm-6 text-center mb-3" >
                            <div id="box'.$num.'" class="box">
                                <img class="w-50 picture-item" src="'.$this->picture.'" alt="" >
                                <div class="popup row show-infor bg-dark rounded" id="popup'.$num.'" style="width: 350px;height:auto;" >
                                    <div class="col-4">
                                        <img class="w-100 pt-3"  src="'.$this->picture.'" alt="">
                                        <p class="text-light">Thong tin ve san pham</p>
                                    </div>
                                    <div class="col-8">
                                        <p class="text-light  text-break text-start">Hệ Điều Hành: '.$this->os_name.'</p>
                                        <p class="text-light  text-break text-start">Thương hiệu : '.$this->brand_name.'</p>
                                        <p class="text-light  text-break text-start">Cpu : '.$this->cpu_brand.' '.$this->cpu_name.'</p>
                                        <p class="text-light  text-break text-start">Ram : '.$this->ram.'</p>
                                        <p class="text-light  text-break text-start">Loại màn hình : '.$this->screen_type.'</p>
                                        <p class="text-light  text-break text-start">Kich thước màn hình : '.$this->screen_size.'</p>
                                        <p class="text-light  text-break text-start">Dung lượng pin : '.$this->battery.'</p>
                                        <p class="text-light  text-break text-start">Camera : '.$this->camera.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center " >  
                                <span class="fs-6 fw-bold">'.$this->product_name.'</span>
                                <span>'.number_format($this->price,0).' đ</span>
                                <button class="btn btn-primary">BUY</button>
                            </div>
                        </div>';

        }
        

        public function add($conn) {
            $sql = 'INSERT INTO product(NAME,CATEGORY_ID,OS_ID,BRAND_ID,CPU_BRAND,CPU_NAME,RAM,SCREEN_TYPE,SCREEN_SIZE,BATTERY,CAMERA,PRICE,DISCOUNT,CREATE_AT) VALUES ("'.$this->product_name.'","'.$this->category_id.'","'.$this->os_id.'","'.$this->brand_id.'","'.$this->cpu_brand.'","'.$this->cpu_name.'","'.$this->ram.'","'.$this->screen_type.'","'.$this->screen_size.'","'.$this->battery.'","'.$this->camera.'","'.$this->price.'","'.$this->discount.'",NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

        public function edit($conn) {
            $sql = 'UPDATE product SET NAME = "'.$this->product_name.'",CATEGORY_ID = "'.$this->category_id.'",OS_ID = "'.$this->os_id.'",BRAND_ID = "'.$this->brand_id.'",CPU_BRAND = "'.$this->cpu_brand.'",CPU_NAME = "'.$this->cpu_name.'",RAM = "'.$this->ram.'",'
                .'SCREEN_TYPE = "'.$this->screen_type.'",SCREEN_SIZE = "'.$this->screen_size.'",BATTERY = "'.$this->battery.'",CAMERA = "'.$this->camera.'",PRICE = "'.$this->price.'",DISCOUNT = "'.$this->discount.'",UPDATE_AT = NOW() WHERE PRODUCT_ID = "'.$this->product_id.'" ';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

        public function delete() {

        }

        public function name_to_id($conn,$name,$table,$select_id) {
            $sql = 'SELECT '.$select_id.' FROM '.$table.' WHERE NAME = "'.$name.'" ';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

        public function id_to_name($conn,$select,$from,$where,$value) {
            $sql = 'SELECT '.$select.' FROM '.$from.' WHERE '.$where.' = "'.$value.'" ';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

        public function list_brand($conn,$id) {
            $sql = 'SELECT BRAND_ID,NAME FROM brand';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row) {
                if($id == $row["NAME"]) {
                    echo " <option value='".$row["BRAND_ID"]."' selected>".$row["NAME"]."</option>";
                } else {
                    echo " <option value='".$row["BRAND_ID"]."'>".$row["NAME"]."</option>";
                }
            }
        }

        public function list_category($conn,$id) {
            $sql = 'SELECT CATEGORY_ID,NAME FROM category';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row) {
                if($id == $row["NAME"]) {
                    echo " <option value='".$row["CATEGORY_ID"]."' selected>".$row["NAME"]."</option>";
                } else {
                    echo " <option value='".$row["CATEGORY_ID"]."'>".$row["NAME"]."</option>";
                }
            }
        }

        public function list_platform($conn,$id) {
            $sql = 'SELECT OS_ID,NAME FROM platform';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row) {
                if($id == $row["NAME"]) {
                    echo " <option value='".$row["OS_ID"]."' selected>".$row["NAME"]."</option>";
                } else {
                    echo " <option value='".$row["OS_ID"]."'>".$row["NAME"]."</option>";
                }
            }
        }
        
    }

    class brand {
        public $brand_id;
        public $name;
        public $country;
        public $create_at;
        public $update_at;

        //hien thi tieu de
        public function show_header() { 
            echo "<tr>
                    <td>BRAND_ID</td>
                    <td>NAME</td>
                    <td>COUNTRY</td>
                    <td>CREATE AT</td>
                    <td>UPDATE AT</td>
                </tr>";
        }

        //hien thi danh sach san pham
        public function show_item() {
            echo '<tr>
                    <td>'.$this->brand_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->country.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?editid=brand&brand_id='.$this->brand_id.'&name='.$this->name.'&country='.$this->country.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light" >Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $a = new config;
            $conn = $a->connect();
            $sql = 'INSERT INTO brand(NAME,COUNTRY,CREATE_AT) VALUES ("'.$this->name.'","'.$this->country.'",'.$this->create_at.')';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }

        public function edit() {
            require "config.php";
            $a = new config;
            $conn = $a->connect();
            $sql = 'UPDATE brand SET NAME = "'.$this->name.'",COUNTRY = "'.$this->country.'",UPDATE_AT = NOW() WHERE BRAND_ID = "'.$this->brand_id.'"';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }
    }

    class category {
        public $category_id;
        public $name;
        public $description;
        public $code;
        public $create_at;
        public $update_at;

        //hien thi tieu de
        public function show_header() { 
            echo "<tr>
                    <td>CATEGORY_ID</td>
                    <td>NAME</td>
                    <td>DESCRIPTION</td>
                    <td>CODE</td>
                    <td>CREATE AT</td>
                    <td>UPDATE AT</td>
                </tr>";
        }

        //hien thi danh sach san pham
        public function show_item() {
            echo '<tr>
                    <td>'.$this->category_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->description.'</td>
                    <td>'.$this->code.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?editid=brand&brand_id='.$this->category_id.'&name='.$this->name.'&description='.$this->description.'&code='.$this->code.'&create_at='.$this->create_at.'&update_at='.$this->update_at.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light" >Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $a = new config;
            $conn = $a->connect();
            $sql = 'INSERT INTO category(NAME,DESCRIPTION,CATEGORY_CODE,CREATE_AT) VALUES ("'.$this->name.'","'.$this->description.'","'.$this->code.'",NOW())';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }
    }

    class platform {
        public $os_id;
        public $name;
        public $version;
        public $create_at;
        public $update_at;

        //hien thi tieu de
        public function show_header() { 
            echo "<tr>
                    <td>OS_ID</td>
                    <td>NAME</td>
                    <td>VERSION</td>
                    <td>CREATE AT</td>
                    <td>UPDATE AT</td>
                </tr>";
        }

        //hien thi danh sach san pham
        public function show_item() {
            echo '<tr>
                    <td>'.$this->os_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->version.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?editid=brand&brand_id='.$this->os_id.'&name='.$this->name.'&version='.$this->version.'&create_at='.$this->create_at.'&update_at='.$this->update_at.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light" >Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $a = new config;
            $conn = $a->connect();
            $sql = 'INSERT INTO platform(NAME,VERSION,CREATE_AT) VALUES ("'.$this->name.'","'.$this->version.'",NOW())';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }
    }

    // Lop quan ly hinh anh
    class galery {
        public $galery_id;
        public $product_id;
        public $category;
        public $product_name;
        public $files;
        public $dir;
        public $filename;
        public $fullpart;
        public $create_at;
        public $update_at;

        //hien thi tieu de
        public function show_header() { 
            echo "<tr>
                    <td>GALERY ID</td>
                    <td>PRODUCT NAME</td>
                    <td>DIR</td>
                    <td>FILE NAME</td>
                    <td>THUMBNAIL</td>
                    <td>CREATE AT</td>
                    <td>UPDATE AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }

        //hien thi danh sach san pham
        public function show_item() {
            echo '<tr>
                    <td>'.$this->galery_id.'</td>
                    <td>'.$this->product_name.'</td>
                    <td>'.$this->dir.'</td>
                    <td>'.$this->filename.'</td>
                    <td><img width="60px" height="60px" src="'.$this->fullpart.'" /></td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="addnew.php?select=galery&galery_id='.$this->galery_id.'&product_id='.$this->product_id.'&product_name='.$this->product_name.'&category='.$this->category.' ">';
                    if($this->galery_id == NULL) {
                        echo "Add";
                    } else {
                        echo "Edit";
                    }
            echo        '</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light" >Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $a = new config;
            $conn = $a->connect();
            $product_id = $this->product_id;
            $files = $this->files;
            $dir = $this->dir;
            $category = $this->category;
            switch($category) {
                case "PHONE":
                    $dir = './assets/img/product/phone/';
                break;
                case "TABLET":
                    $dir = './assets/img/product/tablet/';
                break;

                case "LAPTOP":
                    $dir = './assets/img/product/laptop/';
                break;
                case "SMARTWATCH":
                    $dir = './assets/img/product/smartwatch/';
                break;
                case "ACCESSORY":
                    $dir = './assets/img/product/accessory/';
                break;
            }
            $file_path = $dir.$files;
            echo $file_path;
            $filetype = pathinfo($file_path,PATHINFO_EXTENSION);
            $allowtype = array('jpg','png','jpeg','gif','pdf');
            if(in_array($filetype,$allowtype)) {
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$file_path)) {
                    if($this->galery_id == NULL) {
                        $sql = "INSERT INTO galery(PRODUCT_ID,DIR,FILENAME,CREATE_AT) VALUES ('".$product_id."','".$dir."','".$files."',NOW())";
                    } else {
                        $sql = "UPDATE galery SET FILENAME = '".$files."',UPDATE_AT = NOW() WHERE GALERY_ID = '".$this->galery_id."' ";
                    }
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                } else {
                    echo "file upload error";
                }
            } else {
                echo "please check file type";
            }
        }
        
        //tim ten san pham tu id
    }

    class description {
        public $description_id;
        public $product_id;
        public $product_name;
        public $summary;
        public $content;
        public $create_at;
        public $update_at;

        public function show_header() { 
            echo "<tr>
                    <td>DESCRIPTON ID</td>
                    <td>PRODUCT NAME</td>
                    <td>SUMMARY</td>
                    <td>CONTENT</td>
                    <td>CREATE AT</td>
                    <td>UPDATE AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }

        //hien thi danh sach description
        public function show_item() {
            echo '<tr>
                    <td>'.$this->description_id.'</td>
                    <td>'.$this->product_name.'</td>
                    <td>'.$this->summary.'</td>
                    <td>'.$this->content.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?editid=brand&description_id='.$this->description_id.'&product_id='.$this->product_id.'&content='.$this->content.'&summary='.$this->summary.'&create_at='.$this->create_at.'&update_at='.$this->update_at.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light" >Delete</a></button></td> 
                </tr>';
        }

        public function addnew($conn) {
            $sql = 'INSERT INTO description(PRODUCT_ID,SUMMARY,CONTENT,CREATE_AT) VALUES ("'.$this->product_id.'","'.$this->summary.'","'.$this->content.'",NOW())';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }

        public function id_to_name($select,$from,$where,$value) {
            $a = new config;
            $conn = $a->connect();
            $sql = 'SELECT '.$select.' FROM '.$from.' WHERE '.$where.' = "'.$value.'" ';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }   

        public function list_show($conn) {
            $sql = 'SELECT PRODUCT_ID,NAME FROM product';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row) {
                echo "<option value='".$row["PRODUCT_ID"]."'>".$row["NAME"]."</option>";
            }
        }

    }

    class logins {
        public $logins_id;
        public $user_name;
        public $pass_word;
        public $level;
        public $phone;
        public $email;
        public $status;
        public $saveme;
        public $create_at;
        public $update_at;

        public function show_header() { 
            echo "<tr>
                    <td>LOGINS ID</td>
                    <td>USERNAME</td> 
                    <td>PASSWORD</td>
                    <td>LEVEL</td>
                    <td>PHONE</td>
                    <td>EMAIL</td>
                    <td>CREATE AT</td>
                    <td>UPDATE AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }

        public function show_item() {

                echo "<tr>";
                echo "<td>".$this->logins_id."</td>";
                echo "<td>".$this->user_name."</td>";
                echo "<td>".$this->pass_word."</td>";
                echo "<td>".$this->level."</td>";
                echo "<td>".$this->phone."</td>";
                echo "<td>".$this->email."</td>";
                echo "<td>".$this->status."</td>";
                echo "<td>".$this->saveme."</td>";
                echo "<td>".$this->create_at."</td>";
                echo "<td>".$this->update_at."</td>";
                echo "</tr>";
            }
    
        public function check_username() {
            $a = new config;
            $conn = $a->connect();
            $sql = "SELECT USERNAME FROM logins WHERE USERNAME = '".$this->user_name."' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if(count($results)>0) {
                return true;
            } else {
                return false;
            }
            $conn = NULL;
        }

        public function register() {
            $a = new config;
            $conn = $a->connect();
            $sql= "INSERT INTO logins(USERNAME,PASSWORD,LEVEL,PHONE,EMAIL,STATUS,CREATE_AT) VALUES ('".$this->user_name."','".$this->pass_word."','".$this->level."','".$this->phone."','".$this->email."','".$this->status."',".$this->create_at.")";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn = NULL;
        }

        public function logins() {
            $a = new config;
            $conn = $a->connect();
            $sql = "SELECT USERNAME,PASSWORD FROM logins WHERE USERNAME='".$this->user_name."' AND PASSWORD = '".$this->pass_word."'  ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if(count($results)==1) {
                $name = $this->user_name;
                setcookie("id",md5($name),time()+6000,"/");

                if($this->saveme == "saveme") {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    setcookie("loggedin",$name,time()+6000,"/");
                    echo "login done";
                    echo $_SESSION["loggedin"];
                    header("location: manage.php");
                } else {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    header("location: manage.php");
                }
            } else {
                echo "Invalid username or password";
            }
            $conn = NULL;
        }
    }
?>