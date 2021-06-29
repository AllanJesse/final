<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Registered Players</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM sports";
                                                        $select_all_sports_user = mysqli_query($con, $query);
                                                        $sport = mysqli_num_rows($select_all_sports_user);

                                                        echo " <div class='widget-numbers text-white'><span>{$sport}</span></div>";
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Borrowed Sport's Tools</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM sports WHERE status = 'Borrowed' ";
                                                        $select_all_sport = mysqli_query($con, $query);
                                                        $count_sport = mysqli_num_rows($select_all_sport);

                                                        echo " <div class='widget-numbers text-white'><span>{$count_sport}</span></div>";
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Returned Sport's Tools</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM sports WHERE status = 'cleared' ";
                                                        $select_all_sports = mysqli_query($con, $query);
                                                        $sport_count = mysqli_num_rows($select_all_sports);

                                                        echo " <div class='widget-numbers text-white'><span>{$sport_count}</span></div>";
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>