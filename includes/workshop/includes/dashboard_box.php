<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Registered Devices</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM lended_devices";
                                                        $select_all_devices = mysqli_query($con, $query);
                                                        $device_count = mysqli_num_rows($select_all_devices);

                                                        echo " <div class='widget-numbers text-white'><span>{$device_count}</span></div>";
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
                                            <div class="widget-heading">Borrowed Devices</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM lended_devices WHERE status = 'Borrowed'";
                                                        $select_devices = mysqli_query($con, $query);
                                                        $count_device = mysqli_num_rows($select_devices);

                                                        echo " <div class='widget-numbers text-white'><span>{$count_device}</span></div>";
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
                                            <div class="widget-heading">Returned Devices</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM lended_devices WHERE status = 'Cleared'";
                                                        $select_returns = mysqli_query($con, $query);
                                                        $return_count = mysqli_num_rows($select_returns);

                                                        echo " <div class='widget-numbers text-white'><span>{$return_count}</span></div>";
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>