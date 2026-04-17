document.addEventListener('DOMContentLoaded', () => {
    const photoFileInput = document.getElementById('photo-file');
    const previewPhoto = document.getElementById('preview-photo');
    const fileNameDisplay = document.getElementById('file-name-display');
    const browsebtn = document.getElementById('browse-photo-btn');
    const skillName = document.getElementById('skill-name');
    const skillIcon = document.getElementById('skill-icon');
    const skillDesc = document.getElementById('skill-desc');
    const addSkillBtn = document.getElementById('add-skill');
    const skillsList = document.getElementById('skills-list');

    const projectTitle = document.getElementById('project-title');
    const projectDesc = document.getElementById('project-desc');
    const projectBadges = document.getElementById('project-badges');
    const projectPlaceholder = document.getElementById('project-placeholder');
    const addProjectBtn = document.getElementById('add-project');
    const projectsList = document.getElementById('projects-list');

    const saveAllBtn = document.getElementById('save-all');
    const toast = document.getElementById('toast');

    let skills = [];
    let projects = [];

    // Load data from localStorage
    const loadData = () => {
        const savedPhoto = localStorage.getItem('portfolio_photo');
        if (savedPhoto) {
            previewPhoto.src = savedPhoto;
            fileNameDisplay.textContent = 'Photo loaded from saved data.';
        }

        const savedSkills = localStorage.getItem('portfolio_skills');
        if (savedSkills) {
            skills = JSON.parse(savedSkills);
            renderSkills();
        }

        const savedProjects = localStorage.getItem('portfolio_projects');
        if (savedProjects) {
            projects = JSON.parse(savedProjects);
            renderProjects();
        }
    };

    // Render Skills List
    const renderSkills = () => {
        skillsList.innerHTML = '';
        skills.forEach((skill, index) => {
            const div = document.createElement('div');
            div.className = 'item-row';
            div.innerHTML = `
                <span><i class="${skill.icon}"></i> ${skill.name}</span>
                <button onclick="removeSkill(${index})"><i class="fas fa-trash"></i></button>
            `;
            skillsList.appendChild(div);
        });
    };

    // Render Projects List
    const renderProjects = () => {
        projectsList.innerHTML = '';
        projects.forEach((project, index) => {
            const div = document.createElement('div');
            div.className = 'item-row';
            div.innerHTML = `
                <span>${project.title}</span>
                <button onclick="removeProject(${index})"><i class="fas fa-trash"></i></button>
            `;
            projectsList.appendChild(div);
        });
    };

    // Add Skill
    addSkillBtn.addEventListener('click', () => {
        if (skillName.value && skillIcon.value) {
            skills.push({
                name: skillName.value,
                icon: skillIcon.value,
                desc: skillDesc.value
            });
            skillName.value = '';
            skillIcon.value = '';
            skillDesc.value = '';
            renderSkills();
        }
    });

    // Add Project
    addProjectBtn.addEventListener('click', () => {
        if (projectTitle.value && projectDesc.value) {
            projects.push({
                title: projectTitle.value,
                desc: projectDesc.value,
                badges: projectBadges.value.split(',').map(s => s.trim()),
                placeholder: projectPlaceholder.value
            });
            projectTitle.value = '';
            projectDesc.value = '';
            projectBadges.value = '';
            projectPlaceholder.value = '';
            renderProjects();
        }
    });

    // Remove functions (global so onclick works)
    window.removeSkill = (index) => {
        skills.splice(index, 1);
        renderSkills();
    };

    window.removeProject = (index) => {
        projects.splice(index, 1);
        renderProjects();
    };

    // Photo file upload using FileReader
    photoFileInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (!file) return;

        fileNameDisplay.textContent = `Selected: ${file.name}`;

        const reader = new FileReader();
        reader.onload = (event) => {
            previewPhoto.src = event.target.result;
            // Store the base64 result temporarily in a data attribute
            previewPhoto.dataset.base64 = event.target.result;
        };
        reader.readAsDataURL(file);
    });

    // Hover effect for browse button
    browsebtn.addEventListener('mouseenter', () => { browsebtn.style.background = 'rgba(102,252,241,0.1)'; });
    browsebtn.addEventListener('mouseleave', () => { browsebtn.style.background = 'transparent'; });

    // Save All
    saveAllBtn.addEventListener('click', () => {
        // Save photo: use base64 if a new file was selected, otherwise keep existing saved photo
        if (previewPhoto.dataset.base64) {
            localStorage.setItem('portfolio_photo', previewPhoto.dataset.base64);
        }
        localStorage.setItem('portfolio_skills', JSON.stringify(skills));
        localStorage.setItem('portfolio_projects', JSON.stringify(projects));

        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    });

    loadData();
});
