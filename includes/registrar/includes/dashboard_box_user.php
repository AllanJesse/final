<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Active</div>
                                            <div class="widget-subheading">Users</div>
                                        </div>
                                        <div class="widget-content-right">
                                        <?php
                                            $query = "SELECT * FROM users WHERE status = 'active' ";
                                            $select_all_comments = mysqli_query($con, $query);
                                            $active_user_count = mysqli_num_rows($select_all_comments);

                                            echo " <div class='widget-numbers text-white'><span>{$active_user_count}</span></div>";
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Inactive</div>
                                            <div class="widget-subheading">Users</div>
                                        </div>
                                        <div class="widget-content-right">
                                        <?php
                                            $query = "SELECT * FROM users WHERE status = 'inactive' ";
                                            $select_all_comments = mysqli_query($con, $query);
                                            $inactive_user_count = mysqli_num_rows($select_all_comments);

                                            echo " <div class='widget-numbers text-white'><span>{$inactive_user_count}</span></div>";
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">View</div>
                                            <div class="widget-subheading">All Users</div>
                                        </div>
                                        <div class="widget-content-right">
                                        <?php
                                            $query = "SELECT * FROM users";
                                            $select_all_comments = mysqli_query($con, $query);
                                            $user_count = mysqli_num_rows($select_all_comments);

                                            echo " <div class='widget-numbers text-white'><span>{$user_count}</span></div>";
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>