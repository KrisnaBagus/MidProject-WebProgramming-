<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krisna Portfolio | Fullstack Developer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>

    <!-- Sticky Navigation -->
    <header>
        <div class="logo">KRISNABAGUSPRATAMA<span>.</span></div>
        <div class="nav-links">
            <a href="#hero">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <a href="{{ route('admin.login') }}">Admin</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero">
        <div class="hero-content hidden">
            <h3>WELCOME TO MY WORLD</h3>
            <h1>Hi, I'm <span>Krisna Bagus Pratama</span></h1>
            <h2><span class="typing-animation">Iam Fullstack Developer | Backend to Frontend Specialist. </span></h2>
            <br>
            <p>Saya adalah seorang Fullstack Developer yang berdedikasi dalam membangun ekosistem web secara menyeluruh. Saya mengintegrasikan antarmuka pengguna yang responsif dengan logika 
            backend yang tangguh untuk menciptakan aplikasi digital yang utuh, fungsional, dan dapat diandalkan.</p>
            <a href="#projects" class="btn-primary">View My Work</a>
        </div>
        <div class="hero-image hidden">
            <div class="image-frame">
                <!-- User's profile image -->
                <img src="{{ asset('img/Krisna.jpg') }}" alt="Krisna Bagus Pratama" id="profile-img">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="about-text hidden">
            <h2 class="section-title">About Me</h2>
            <p>Halo! Saya Krisna Bagus Pratama. Perjalanan saya di dunia software engineering telah membekali saya dengan keahlian yang beragam, 
            mulai dari menyusun logika backend dengan Laravel hingga membangun arsitektur frontend yang mulus menggunakan JavaScript.</p>
            <p>Saya sangat antusias dalam mengubah masalah yang kompleks menjadi desain yang elegan dan minimalis. Di luar aktivitas coding, 
            saya terus mendalami paradigma teknologi terbaru, desain sistem, serta estetika UI.</p>
        </div>
        <div class="about-visual hidden">
            <div class="data-box">
                <ul>
                    <li><span>Nama :</span> Krisna Bagus Pratama</li>
                    <li><span>Umur :</span> 20 Years</li>
                    <li><span>Role :</span> Fullstack Developer</li>
                    <li><span>Lokasi:</span> Indonesia</li>
                    <li><span>Email :</span> krisna.pratama001@binus.ac.id</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="title-centered">
        <h2 class="section-title hidden">My Tech Stack</h2>
        <div class="skills-grid" id="skills-container">
            <div class="skill-card hidden">
                <i class="fab fa-laravel"></i>
                <h3>Laravel</h3>
                <p>Merancang arsitektur API yang kokoh, relasi database, dan sistem backend yang solid.</p>
            </div>
            <div class="skill-card hidden">
                <i class="fab fa-php"></i>
                <h3>PHP</h3>
                <p>Membangun aplikasi server-side dan halaman web dinamis dengan logika pemrograman yang murni.</p>
            </div>
            <div class="skill-card hidden">
                <i class="fab fa-js"></i>
                <h3>JavaScript</h3>
                <p>Menambahkan interaktivitas dan logika langsung ke dalam antarmuka pengguna demi pengalaman pengguna (UX) yang lebih baik.</p>
            </div>
            <div class="skill-card hidden">
                <i class="fab fa-java"></i>
                <h3>Java</h3>
                <p>Membuat aplikasi perusahaan (enterprise) berbasis objek yang dapat berjalan di berbagai platform.</p>
            </div>
            <div class="skill-card hidden">
                <i class="fab fa-bootstrap"></i>
                <h3>Bootstrap</h3>
                <p>Merancang dan menyesuaikan situs web mobile-first yang responsif secara cepat.</p>
            </div>
            <div class="skill-card hidden">
                <i class="fab fa-css3-alt"></i>
                <h3>Modern CSS</h3>
                <p>Mendesain tampilan yang dinamis, responsif, dan memiliki estetika premium.</p>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="title-centered">
        <h2 class="section-title hidden">Featured Projects</h2>
        <div class="projects-grid" id="projects-container">
            <!-- Project 1 -->
            <div class="project-card hidden">
                <div class="project-img">Apotek Management</div>
                <div class="project-info">
                    <h3>Pharmacy Management System</h3>
                    <p>Sebuah sistem komprehensif untuk melacak inventaris, 
                    memproses transaksi, dan mengelola stok obat-obatan secara aman.</p>
                    <div class="tech-badges">
                        <span class="tech-badge">Laravel</span>
                        <span class="tech-badge">SQL</span>
                        <span class="tech-badge">Bootstrap</span>
                    </div>
                </div>
            </div>
            <!-- Project 2 -->
            <div class="project-card hidden">
                <div class="project-img">Online Banking UI</div>
                <div class="project-info">
                    <h3>FutureBank Dashboard</h3>
                    <p>Mockup antarmuka (UI) interaktif dengan keamanan tinggi 
                    untuk aplikasi perbankan digital modern dan transfer uang.</p>
                    <div class="tech-badges">
                        <span class="tech-badge">HTML/CSS</span>
                        <span class="tech-badge">JavaScript</span>
                        <span class="tech-badge">Figma</span>
                    </div>
                </div>
            </div>
            <!-- Project 3 -->
            <div class="project-card hidden">
                <div class="project-img">Laundry Services</div>
                <div class="project-info">
                    <h3>Wash&Go Platform</h3>
                    <p>Sistem Point of Sale (POS) dan pelacakan end-to-end untuk mengelola operasional laundry serta faktur (invoice) pengguna.</p>
                    <div class="tech-badges">
                        <span class="tech-badge">PHP</span>
                        <span class="tech-badge">MySQL</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="title-centered">
        <div class="contact-content hidden">
            <h2 class="section-title">Get In Touch</h2>
            <p>Saat ini saya sedang aktif mencari peluang baru dan kolaborasi seru. Baik itu pertanyaan teknis atau sekadar ingin mengobrol, silakan hubungi saya kapan saja!</p>
            <a href="mailto:hello@krisna.dev" class="btn-primary">Say Hello</a>

            <div class="social-links">
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Krisna Bagus Pratama. Designed & Built flawlessly.</p>
    </footer>

    <script src="{{ asset('main.js') }}"></script>
</body>

</html>