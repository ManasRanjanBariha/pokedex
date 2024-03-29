<div class="row">
                    <div class="col-sm-6 mx-auto">
                        <?php include 'db.php';
                        $sql = "SELECT * FROM portfolio_user_profile";
                        $result = $conn->query($sql);
                        if ($row = $result->fetch_assoc()) { ?>
                            <form action="user.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id2" id="id2" value='<?php echo $row['id']; ?>'>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">profile photo</label>
                                    <input class="form-control" type="file" id="formFile" name="image"
                                        value="upload/profilephoto/<?php echo $row['profile_photo']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">cover photo</label>
                                    <input class="form-control" type="file" id="formFile" name="coverimage"
                                        value="upload/coverphoto/<?php echo $row['profile_cover_photo']; ?>">
                                    <img id="imagePreview" src="#" alt="pic" width="50" height="50" />
                                    <img src="upload/coverphoto/<?php echo $row['profile_cover_photo']; ?>" id="image1"
                                        alt="profile image" width="50" height="50">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="<?php echo $row['user_name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="address" class="form-control" id="address"
                                        value="<?php echo $row['user_address']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="<?php echo $row['user_email']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        value="<?php echo $row['user_phone']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="twitter" class="form-control" id="twitter"
                                        value="<?php echo $row['user_twitter']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="facebook" class="form-control" id="facebook"
                                        value="<?php echo $row['user_facebook']; ?>">
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                    <input type="text" name="instagram" class="form-control" id="instagram"
                                        value="<?php echo $row['user_instagram']; ?>">
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                    <input type="text" name="skype" class="form-control" id="skype"
                                        value="<?php echo $row['user_s']; ?>">
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                    <input type="text" name="linkedin" class="form-control" id="linkedin"
                                        value="<?php echo $row['user_linkedin']; ?>">
                                </div>
                                <div class="mb-3">
                                    <button type="Submit" name="updateuser" value="Submit"
                                        class="btn btn-primary">UPDATE</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>