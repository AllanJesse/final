<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">New Registered User</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>1896</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Current Users Available</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span> 568</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Overall Users</div>
                                            <div class="widget-subheading">All Years</div>
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