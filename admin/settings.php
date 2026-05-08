<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('inc/link.php'); ?>
    <style>
        .settings-section { margin-bottom: 28px; }
        .settings-section .card { border: none; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,.07); }
        .settings-section .card-header {
            background: #fff;
            border-bottom: 1.5px solid #f0f0f0;
            border-radius: 10px 10px 0 0 !important;
            padding: 16px 20px 12px;
        }
        .settings-section .card-header h6 { font-weight: 600; font-size: 14px; margin: 0; color: #1a1a2e; }
        .settings-section .card-body { padding: 20px; }
        .form-label { font-size: 13px; font-weight: 500; color: #444; }
        .form-control, .form-select {
            font-size: 13.5px; border-radius: 8px;
            border: 1.5px solid #e0e0e0; padding: 8px 12px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #343a40; box-shadow: 0 0 0 3px rgba(52,58,64,.1);
        }
        .btn { border-radius: 8px; font-size: 13.5px; font-weight: 500; padding: 8px 20px; }
        .divider { border-top: 1px solid #f0f0f0; margin: 16px 0; }
        .toggle-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #f5f5f5; }
        .toggle-row:last-child { border-bottom: none; padding-bottom: 0; }
        .toggle-row:first-child { padding-top: 0; }
        .toggle-row-label { font-size: 13.5px; font-weight: 500; color: #222; }
        .toggle-row-sub { font-size: 12px; color: #888; }
    </style>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="col-lg-10 ms-auto p-4 overflow-hidden" id="main-content">

        <h3 class="mb-1 h-font">SETTINGS</h3>
        <p class="text-muted mb-4" style="font-size:13px;">Manage your admin account and preferences</p>

        <div class="row g-4">

            <!-- LEFT COLUMN -->
            <div class="col-lg-7">

                <!-- Profile -->
                <div class="settings-section">
                    <div class="card">
                        <div class="card-header"><h6>Profile Information</h6></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="Admin">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="User">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="admin@hbhotel.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Role</label>
                                    <select class="form-select">
                                        <option selected>Administrator</option>
                                        <option>Editor</option>
                                        <option>Viewer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-outline-secondary">Discard</button>
                                <button class="btn btn-dark">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="settings-section">
                    <div class="card">
                        <div class="card-header"><h6>Change Password</h6></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-dark">Update Password</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Site Settings -->
                <div class="settings-section">
                    <div class="card">
                        <div class="card-header"><h6>Site Settings</h6></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Hotel Name</label>
                                    <input type="text" class="form-control" value="HB Hotel">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Contact Email</label>
                                    <input type="email" class="form-control" value="contact@hbhotel.com">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" value="+84 123 456 789">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" rows="2">123 Nguyen Trai, Hanoi, Vietnam</textarea>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-dark">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-lg-5">

                <!-- Notifications -->
                <div class="settings-section">
                    <div class="card">
                        <div class="card-header"><h6>Notifications</h6></div>
                        <div class="card-body">
                            <div class="toggle-row">
                                <div>
                                    <div class="toggle-row-label">Email Alerts</div>
                                    <div class="toggle-row-sub">New bookings and cancellations</div>
                                </div>
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" checked>
                                </div>
                            </div>
                            <div class="toggle-row">
                                <div>
                                    <div class="toggle-row-label">Security Alerts</div>
                                    <div class="toggle-row-sub">Login attempts and changes</div>
                                </div>
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" checked>
                                </div>
                            </div>
                            <div class="toggle-row">
                                <div>
                                    <div class="toggle-row-label">Weekly Report</div>
                                    <div class="toggle-row-sub">Summary every Monday</div>
                                </div>
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preferences -->
                <div class="settings-section">
                    <div class="card">
                        <div class="card-header"><h6>Preferences</h6></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Language</label>
                                <select class="form-select">
                                    <option selected>English</option>
                                    <option>Tiếng Việt</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Timezone</label>
                                <select class="form-select">
                                    <option selected>Asia/Ho_Chi_Minh (GMT+7)</option>
                                    <option>UTC</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Date Format</label>
                                <select class="form-select">
                                    <option selected>DD/MM/YYYY</option>
                                    <option>MM/DD/YYYY</option>
                                    <option>YYYY-MM-DD</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="settings-section">
                    <div class="card border border-danger" style="border-radius:10px !important;">
                        <div class="card-header" style="background:#fff3f3; border-bottom:1.5px solid #f8d7da;">
                            <h6 style="color:#dc3545;">Danger Zone</h6>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-3" style="font-size:13px;">
                                Permanently delete your account. This cannot be undone.
                            </p>
                            <button class="btn btn-outline-danger btn-sm w-100"
                                onclick="return confirm('Are you sure? This cannot be undone.')">
                                Delete Account
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
<?php require('inc/scripts.php'); ?>
</body>
</html>