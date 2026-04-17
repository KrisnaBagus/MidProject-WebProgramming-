const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // Load Dynamic Data from LocalStorage
    loadDynamicData();

    const hiddenElements = document.querySelectorAll('.hidden');
    hiddenElements.forEach((el) => observer.observe(el));
});

function loadDynamicData() {
    // Profile Photo
    const savedPhoto = localStorage.getItem('portfolio_photo');
    if (savedPhoto) {
        const profileImg = document.getElementById('profile-img');
        if (profileImg) profileImg.src = savedPhoto;
    }

    // Skills - append to existing defaults
    const savedSkills = localStorage.getItem('portfolio_skills');
    if (savedSkills) {
        const skills = JSON.parse(savedSkills);
        const container = document.getElementById('skills-container');
        if (container && skills.length > 0) {
            // Append new skills WITHOUT clearing existing ones
            skills.forEach(skill => {
                container.innerHTML += `
                    <div class="skill-card hidden">
                        <i class="${skill.icon}"></i>
                        <h3>${skill.name}</h3>
                        <p>${skill.desc}</p>
                    </div>
                `;
            });
        }
    }

    // Projects - append to existing defaults
    const savedProjects = localStorage.getItem('portfolio_projects');
    if (savedProjects) {
        const projects = JSON.parse(savedProjects);
        const container = document.getElementById('projects-container');
        if (container && projects.length > 0) {
            // Append new projects WITHOUT clearing existing ones
            projects.forEach(project => {
                const badges = project.badges.map(b => `<span class="tech-badge">${b}</span>`).join('');
                container.innerHTML += `
                    <div class="project-card hidden">
                        <div class="project-img">${project.placeholder || 'Project'}</div>
                        <div class="project-info">
                            <h3>${project.title}</h3>
                            <p>${project.desc}</p>
                            <div class="tech-badges">${badges}</div>
                        </div>
                    </div>
                `;
            });
        }
    }
}
