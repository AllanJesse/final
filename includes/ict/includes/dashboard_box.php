<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Registered Books</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM books";
                                                        $select_all_comments = mysqli_query($con, $query);
                                                        $book_count = mysqli_num_rows($select_all_comments);

                                                        echo " <div class='widget-numbers text-white'><span>{$book_count}</span></div>";
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
                                            <div class="widget-heading">Borrowed Books</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM books";
                                                        $select_all_comments = mysqli_query($con, $query);
                                                        $book_count = mysqli_num_rows($select_all_comments);

                                                        echo " <div class='widget-numbers text-white'><span>{$book_count}</span></div>";
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
                                            <div class="widget-heading">Returned Books</div>
                                            <div class="widget-subheading">This Year</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>
                                                    <?php
                                                        $query = "SELECT * FROM books";
                                                        $select_all_comments = mysqli_query($con, $query);
                                                        $book_count = mysqli_num_rows($select_all_comments);

                                                        echo " <div class='widget-numbers text-white'><span>{$book_count}</span></div>";
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>