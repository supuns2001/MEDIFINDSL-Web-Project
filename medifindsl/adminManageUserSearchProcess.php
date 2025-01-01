<?php
session_start();
require "connection.php";

$email = $_GET["email"];
$name = $_GET["name"];

// echo($email);
// echo($name);




$query = "SELECT * FROM `user` ";

if (!empty($email) && empty($name)) {
    $query .= " WHERE `email` LIKE '%" . $email . "%' ";
} else if (empty($email) && !empty($name)) {
    $query .= " WHERE `mobile` LIKE '%" . $name . "%'  ";
} else if (!empty($email) && !empty($name)) {
    $query .= " WHERE `email` LIKE '%" . $email . "%' AND  `mobile` LIKE '%" . $name . "%' ";
}

?>


<div class="row">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User image</th>
                <th scope="col">User Name</th>
                <th scope="col">User email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Registed date</th>


            </tr>
        </thead>
        <tbody>
            <?php

       

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $user_rs = Database::search($query);
            $user_num = $user_rs->num_rows;

            $results_per_page = 6;
            $number_of_pages = ceil($user_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <div class=" mx-lg-3 adminProdctImg">
                            <?php
                            $imag_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $selected_data["email"] . "'");
                            $imag_num = $imag_rs->num_rows;

                            if ($imag_num == 1) {
                                $imag_data = $imag_rs->fetch_assoc();
                            ?>
                                <img src="<?php echo $imag_data["path"]; ?>" style="width: 50px; height: 50px; border-radius: 80px;" />
                            <?php

                            } else {
                            ?>
                                <img src="resource/profile_img/newUser.svg" style="width: 50px; height: 50px; border-radius: 80px;" />
                            <?php
                            }
                            ?>

                        </div>
                    </td>
                    <td><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></td>
                    <td><?php echo $selected_data["email"]; ?></td>
                    <td><?php echo $selected_data["mobile"]; ?></td>
                    <td><?php echo $selected_data["join_date"]; ?></td>
                    <td class="">
                        <div class="col-12 col-lg-12 bg-white py-2 d-grid">
                            <?php

                            if ($selected_data["status"] == 1) {
                            ?>
                                <button class="tBlockbtn" onclick="blockUser('<?php echo $selected_data['email']; ?>');" id="ub<?php echo $selected_data["email"] ?>">Block</button>

                            <?php

                            } else {
                            ?>
                                <button class="tUnblockbtn" onclick="blockUser('<?php echo $selected_data['email']; ?>');" id="ub<?php echo $selected_data["email"] ?>">Unblock</button>

                            <?php
                            }

                            ?>


                        </div>

                    </td>


                </tr>
            <?php
            }

            ?>


        </tbody>
    </table>

    <!-- pagination -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" href="<?php echo "?page=" . ($x) ?>"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo "?page=" . ($x) ?>"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" href=" <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo  "?page="($pageno + 1);
                                                } ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- pagination -->


</div>