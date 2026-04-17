<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Krisna Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .dashboard-container {
            padding: 100px 5% 50px;
            background: #0b0c10;
            min-height: 100vh;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
            border-bottom: 1px solid var(--glass-border);
            padding-bottom: 20px;
        }
        .dashboard-header h1 {
            color: var(--white);
            font-size: 32px;
        }
        .dashboard-header h1 span {
            color: var(--primary-color);
        }
        .logout-btn {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }
        .logout-btn:hover {
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.4);
            transform: scale(1.05);
        }
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
        }
        .admin-card {
            background: var(--surface-color);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid var(--glass-border);
        }
        .admin-card h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: var(--text-color);
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            background: rgba(11, 12, 16, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 5px;
            color: white;
            outline: none;
        }
        .form-group input:focus {
            border-color: var(--primary-color);
        }
        .btn-add {
            background: var(--primary-color);
            color: var(--bg-color);
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 700;
            width: 100%;
            margin-top: 10px;
        }
        .item-list {
            margin-top: 20px;
            max-height: 200px;
            overflow-y: auto;
            border-top: 1px solid var(--glass-border);
            padding-top: 15px;
        }
        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: rgba(255,255,255,0.03);
            margin-bottom: 5px;
            border-radius: 5px;
        }
        .item-row button {
            background: none;
            border: none;
            color: #ff4d4d;
            cursor: pointer;
            font-size: 16px;
        }
        .item-row span {
            font-size: 14px;
        }
        .save-all-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--primary-color);
            color: var(--bg-color);
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 800;
            border: none;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(102, 252, 241, 0.4);
            z-index: 100;
            font-size: 18px;
            transition: 0.3s;
        }
        .save-all-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(102, 252, 241, 0.6);
        }
        #toast {
            position: fixed;
            bottom: -100px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-color);
            color: var(--bg-color);
            padding: 15px 40px;
            border-radius: 10px;
            font-weight: 700;
            transition: 0.5s;
            z-index: 1000;
        }
        #toast.show {
            bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>ADMIN<span>DASHBOARD</span></h1>
            <div style="display: flex; gap: 15px; align-items: center;">
                <a href="{{ route('home') }}" style="color: var(--text-color); text-decoration: none; font-weight: 600;">View Site</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </header>

        <div class="admin-grid">
            <!-- Profile Photo -->
            <div class="admin-card">
                <h2><i class="fas fa-user-circle"></i> Profile Photo</h2>
                <div class="form-group">
                    <label>Current Photo Preview</label>
                    <div style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden; margin-bottom: 15px; border: 2px solid var(--primary-color); box-shadow: 0 0 15px rgba(102,252,241,0.2);">
                        <img id="preview-photo" src="{{ asset('img/Krisna.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <label>Choose Photo from Your Computer</label>
                    <div style="position: relative;">
                        <input type="file" id="photo-file" accept="image/*" style="display: none;">
                        <button type="button" id="browse-photo-btn" onclick="document.getElementById('photo-file').click()" style="width: 100%; padding: 12px; background: transparent; border: 1px dashed var(--primary-color); border-radius: 8px; color: var(--primary-color); cursor: pointer; font-size: 14px; font-family: Outfit, sans-serif; transition: 0.3s;">
                            <i class="fas fa-folder-open" style="margin-right: 8px;"></i>Browse Photo...
                        </button>
                    </div>
                    <p id="file-name-display" style="color: var(--text-color); font-size: 12px; margin-top: 8px;">No file selected.</p>
                </div>
            </div>

            <!-- Skills Management -->
            <div class="admin-card">
                <h2><i class="fas fa-tools"></i> Manage Skills</h2>
                <div class="form-group">
                    <label for="skill-name">Skill Name</label>
                    <input type="text" id="skill-name" placeholder="e.g. React.js">
                </div>
                <div class="form-group">
                    <label for="skill-icon">FontAwesome Icon Class</label>
                    <input type="text" id="skill-icon" placeholder="e.g. fab fa-react">
                </div>
                <div class="form-group">
                    <label for="skill-desc">Description</label>
                    <input type="text" id="skill-desc" placeholder="Brief description...">
                </div>
                <button class="btn-add" id="add-skill">Add Skill</button>

                <div class="item-list" id="skills-list">
                    <!-- Skills will appear here -->
                </div>
            </div>

            <!-- Projects Management -->
            <div class="admin-card">
                <h2><i class="fas fa-project-diagram"></i> Manage Projects</h2>
                <div class="form-group">
                    <label for="project-title">Project Title</label>
                    <input type="text" id="project-title" placeholder="Project Name">
                </div>
                <div class="form-group">
                    <label for="project-desc">Description</label>
                    <textarea id="project-desc" rows="3" placeholder="Describe the project..."></textarea>
                </div>
                <div class="form-group">
                    <label for="project-badges">Tech Badges (comma separated)</label>
                    <input type="text" id="project-badges" placeholder="Laravel, MySQL, React">
                </div>
                <div class="form-group">
                    <label for="project-placeholder">Placeholder Text</label>
                    <input type="text" id="project-placeholder" placeholder="e.g. UI/UX Design">
                </div>
                <button class="btn-add" id="add-project">Add Project</button>

                <div class="item-list" id="projects-list">
                    <!-- Projects will appear here -->
                </div>
            </div>
        </div>

        <button class="save-all-btn" id="save-all">SAVE ALL CHANGES</button>
        <div id="toast">Changes Saved Successfully!</div>
    </div>

    <script src="{{ asset('admin.js') }}"></script>
</body>
</html>
