<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];


  $sql = "insert into `messageme` (name, email, phone, message) values('$name', '$email', '$phone', '$message')";

  $result = mysqli_query($con, $sql);

  if ($result) {
    echo "Data inserted successfully";
    //header('location:display.php');
  } else {
    die(mysqli_error($con));
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="mediaqueries.css" />
  <script src="script.js"></script>
  />

  <style>
    /* Contact Form Styles */
    body {
      font-family: Arial, sans-serif;
    }

    .contact-form {
      height: 60%;
      width: 70%;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 100px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: flex;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
    }

    button[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* @media screen and (max-width: 768px){
      .contact-form {
        max-width: 90%;
      }
      
    } */
  </style>
  
  <!-- <script>
    const ws = new WebSocket('ws://localhost:8080/chat');
  </script> -->

</head>

<body>
  <!-- Navigation bar for desktop -->
  <nav id="desktop-nav">
    <div class="logo">
      <!-- Kazi Tasrif -->
      <?php
      $sql = "Select * from `home`";
      $result = mysqli_query($con, $sql);

      $row = mysqli_fetch_assoc($result);

      $id = $row['id'];
      $name = $row['name'];


      echo "$name";


      ?>

    </div>
    <div>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
  </nav>
  <!-- Navigation for mobile phones -->
  <nav id="hamburger-nav">
    <div class="logo">Kazi Tasrif</div>

    <div class="hamburger-menu">
      <div class="hamburger-icon" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="menu-links">
        <li><a href="#about" onclick="toggleMenu()">About</a></li>
        <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
        <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
        <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
      </div>
    </div>
  </nav>
  <!-- PROFILE SECTION -->
  <section id="profile">
    <div class="section__pic-container">
      <img src="./assets/profilepicture.png" alt="Kazi Tasrif profile picture" id="profilepic" />
    </div>
    <div class="section__text">
      <h1 class="section__text__p1">Hello, I'm</h1>
      <h1 class="title">
        <!-- NAME: KAZI TASRIF PHP -->
        <?php
        $sql = "Select * from `home`";
        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        $name = $row['name'];

        echo "$name";
        ?>
      </h1>
      <h1 class="section__text__p2">

        <?php
        $sql = "Select * from `home`";
        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        $subtitle = $row['subtitle'];

        echo "$subtitle";
        ?>
      </h1>

      <div class="btn-container">
        <button class="btn btn-color-2" onclick="window.open('./assets/resume-example.pdf')">
          Download CV</button>
        <button class="btn btn-color-1" onclick="location.href='./#contact'">
          Download CV</button>
      </div>

      <div id="socials-container">
        <img src="./assets/linkedin.png" alt="My LinkedIn profile" class="icon" onclick="location.href='https://linkedin.com/'">

        <img src="./assets/github.png" alt="My GitHub profile" class="icon" onclick="location.href='https://github.com/'">

      </div>


    </div>
  </section>

  <section id="about">
    <h4 class="section__text__p1">Get To Know More</h4>
    <h1 class="title">About Me</h1>
    <div class="section-container">
      <div class="section__pic-container">
        <img src="./assets/about-pic.png" alt="Profile picture" class="about-pic" />
      </div>

      <div class="about-details-container">
        <div class="about-containers">
          <div class="details-container">
            <img src="./assets/experience.png" alt="Experience icon" class="icon" />
            <h3>Experience</h3>
            <p>
              <!-- 2+ years <br /> Frontend Development -->
              <?php
              $sql = "SELECT * FROM `about`";
              $result = mysqli_query($con, $sql);

              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $exp1 = $row['experience1'];

                echo "$exp1<br>";
              }
              ?>

            </p>
          </div>
          <div class="details-container">
            <img src="./assets/education.png" alt="Education icon" class="icon" />
            <h3>Education</h3>
            <p>
              <!-- B.Sc. Bachelors Degre <br /> M.Sc. Masters Degree -->
              <?php
              $sql = "Select * from `about`";
              $result = mysqli_query($con, $sql);

              while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $edu1 = $row['education1'];

                echo "$edu1<br>";
              }
              ?>
            </p>
          </div>
        </div>

        <div class="text-container">
          <p>
            <?php
            $sql = "Select * from `about`";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)){
              $id = $row['id'];
              $des1 = $row['description1'];

              echo "$des1";

            }

            // $id = $row['id'];
            // $des1 = $row['description1'];

            // echo "$des1";
            // echo "$des1";

            ?>

          </p>
        </div>
      </div>
    </div>

    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#experience'" />
  </section>

  <section id="experience">
    <h4 class="section__text__p1">Explore My</h4>
    <h1 class="title">Experience</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <div class="details-container">
          <h2 class="experience-sub-title">Frontend Developer</h2>
          <div class="article-container">
            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>HTML</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>CSS</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>JavaScript</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>TypeScript</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>PHP</h3>
                <p>Experienced</p>
              </div>
            </article>
          </div>
        </div>

        <div class="details-container">
          <h2 class="experience-sub-title">Frontend Developer</h2>
          <div class="article-container">
            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>HTML</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>CSS</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>JavaScript</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>TypeScript</h3>
                <p>Experienced</p>
              </div>
            </article>

            <article>
              <img src="./assets//checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>PHP</h3>
                <p>Experienced</p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#projects'" />

  </section>

  <section id="projects">
    <h4 class="section__text__p1">Browse My Recent</h4>
    <h1 class="title">Projects</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <div class="details-container color-container">
          <div class="article-container">
            <img src="./assets/project-1.png" alt="Project 1" class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project One</h2>

          <div class="btn-container">
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">GitHub</button>
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>

          </div>
        </div>
        <div class="details-container color-container">
          <div class="article-container">
            <img src="./assets/project-2.png" alt="Project 2" class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project One</h2>

          <div class="btn-container">
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">GitHub</button>
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>

          </div>
        </div>
        <div class="details-container color-container">
          <div class="article-container">
            <img src="./assets/project-3.png" alt="Project 3" class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project One</h2>

          <div class="btn-container">
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">GitHub</button>
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>

          </div>
        </div>
      </div>
    </div>
    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#contact'" />
  </section>




  <section id="contact">
    <h1 class="section__text__p1"><strong>Get in Touch</strong></h1>

    <div class="contact-form">
      <form id="contact-form" action="#" method="post">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="tel" id="phone" name="phone">
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" name="submit">Submit</button>
      </form>
    </div>




    <h1 class="title">Contact Me</h1>
    <div class="contact-info-upper-container">
      <div class="contact-info-container">
        <img src="./assets/email.png" alt="Email icon" class="icon contact-icon email-icon" />
        <p><a href="mailto:exampleemail@gmail.com">kazitasrif@gmail.com</a></p>
      </div>
      <div class="contact-info-container">
        <img src="./assets/linkedin.png" alt="LinkedIn icon" class="icon contact-icon" />
        <p><a href="https://www.linkedin.com">LinkedIn</a></p>
      </div>
    </div>



  </section>

  <footer>
    <nav>
      <div class="nav-links-container">
        <ul class="nav-links">
          <li><a href="#about">About</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
    </nav>
    <p>Copyright &#169; 2024 Kazi Tasrif. All Rights Reserved.</p>
  </footer>
</body>

</html>