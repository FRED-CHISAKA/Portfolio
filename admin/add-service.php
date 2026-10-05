<?php
    include "header.php";
    include "sidebar.php";

?>
        
        
        <div class="page-wrapper">
            <div class="content">

                <!-- Page Header -->
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Add Service</h4>
                    </div>
                    <div class="col-sm-4 col-8 text-right m-b-30">
                        <a href="services.php" class="btn btn-primary btn-rounded float-right">
                            <i class="fa fa-arrow-left"></i> Back to Services
                        </a>
                    </div>
                </div>
                
                <form action="" method="POST" enctype="multipart/form-data">

                    <!-- Service Information -->
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title">Service Information</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Service Name *</label>
                                        <input type="text" name="service_name" class="form-control" placeholder="Software Development" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Font Awesome Icon *</label>
                                        <input type="text" name="service_icon" class="form-control" placeholder="fa fa-code" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description *</label>
                                        <textarea class="form-control" rows="3" name="short_description"
                                                placeholder="Displayed on service cards"
                                                required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Full Description *</label>
                                        <textarea class="form-control" rows="8" name="full_description"
                                                placeholder="Detailed service description"
                                                required></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Service Media -->
                    <div class="card shadow mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Service Media</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Service Image</label>
                                        <input type="file" name="service_image" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <input type="file" name="banner_image" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Service Settings -->
                    <div class="card shadow mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Service Settings</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Page URL *</label>
                                        <input type="text" name="service_url" class="form-control"
                                            placeholder="software-development">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Display Order</label>
                                        <input type="number" name="display_order" class="form-control" value="1">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Featured Service</label>
                                        <select name="featured" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Service Features -->
                    <div class="card shadow mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Service Features</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Feature 1</label>
                                        <input type="text" name="feature1" class="form-control" placeholder="Custom Software Development">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Feature 2</label>
                                        <input type="text" name="feature2" class="form-control" placeholder="API Integration">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Feature 3</label>
                                        <input type="text" name="feature3" class="form-control" placeholder="Database Design">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Feature 4</label>
                                        <input type="text" name="feature4" class="form-control" placeholder="System Maintenance">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Technologies -->
                    <div class="card shadow mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Technologies Used</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Technologies</label>
                                <textarea class="form-control" rows="4" name="technologies"
                                        placeholder="PHP, Laravel, MySQL, JavaScript, React, Flutter"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Settings -->
                    <div class="card shadow mt-4">
                        <div class="card-header">
                            <h4 class="card-title">SEO Settings</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" rows="4" name="meta_description"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input type="text" name="keywords" class="form-control"
                                            placeholder="software development, web development, cybersecurity">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="text-right mt-4 mb-5">
                        <button type="reset" class="btn btn-secondary">
                            <i class="fa fa-refresh"></i> Reset
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save Service
                        </button>
                    </div>
                </form>
            </div>

<?php include "footer.php"; ?>


