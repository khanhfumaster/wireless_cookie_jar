<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <title>Wireless Cookie Jar | About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">Wireless Cookie Jar</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li class="active"><a href="#">About</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>About</h1>
        <p>Have you ever gotten off the computer and walked all the way to the kitchen for a cookie only to find out that the cookie jar is empty? If only there was a way to check the jar without having to get off the computer...</p>
        <p><a href="#problem" class="btn btn-primary btn-large">Problem Specification</a> 
          <a href="#design" class="btn btn-primary btn-large">Design</a>
          <a href="#" class="btn btn-primary btn-large">Demonstration</a>
          <a href="#" class="btn btn-primary btn-large">Final Report</a>
        </p>
      </div>
      <div class="hero-unit" id ="problem">
        <h2>Problem Specification</h2>
        <h3>Aim</h3>
        <p>The aim of the “Wifi Cookie Jar” project is to develop a cookie jar that can detect how many cookies are left inside it and send the data to a web application would display the information to the user. Ideally it would provide the user with the number of cookies left in the jar using a load cell and calculations based on the average serving size information. 

        It will utilise the Arduino DUE with additional components for the cookie jar itself and Ruby on Rails 3.1 for the web application.
        </p>
        <hr>
        <h3>Performance Goals</h3>
        <p>Our goal is to be able to determine if the cookie jar is empty or full. We would then like to be able to determine how many cookies are left in the jar. 

        With connectivity side of the project, we aim to be able to maintain a constant connection to the internet so that the web application can monitor the cookie jar and its contents.

        Our goal for the web based side of the project is to build a simple web applications using Ruby on Rails 3.1. The application will ideally be able receive data from the cookie jar, process it and display it on a website.
        </p>
        <hr>
        <h3>Anticipated Difficulties</h3>
        <p>The most anticipated difficulty would be being able to acquire the required parts to build this project on time before the due date.

        Since the Arduino DUE is still fairly new, there are limited libraries and compatibility issues with shields since it now produces a voltage of 3.3V and not the expected 5V. 

        There is limited documentation on how to get the Wifi shield to work properly with the Arduino DUE, so we anticipate difficulty in setting up the wireless connection and sending the data through a HTTP POST or GET response.

        The load cell obtained does not have a data sheet provided, this will make calibrating the load cell to get accurate readings difficult without knowing the details and specifications of the component.

        </p>
        <hr>
        <h3>Responsibilities</h3>
        <p>We have decided to split the the project into two parts:</p>
        <h4>Hardware Developer: Kevin</h4>
        <li>Attaching jar to load cell</li>
        <li>Amplifying the signal from the load cell</li>
        <li>Sensor for the lid</li>

        <h4>Software Developer: Khanh</h4>
        <li>Web applications</li>
        <li>Implement the connectivity with the Wifi shield</li>
        <hr>
        <h3>Required Components</h3>
        <li>Arduino DUE</li>
        <li>Breadboard</li>
        <li>Cookie with lid (preferably a light one)</li>
        <li>Load cell</li>
        <li>Instrument amplifier (INA126PA)</li>
        <li>Wifi Shield (Seeed Studio)</li>

      </div>

      <div class="hero-unit" id ="design">
        <h2>Design</h2>

        <h3>WiFi Cookie Jar System Design</h3>
        <p>The design of the WiFi Cookie Jar system will consist of the following:</p>

        <ol>
          <li>A cookie jar that is light in weight so that it would not affect the load cell output too much. The lid of the cookie jar will also have its own circuit which will determine when data should be transmitted or not.</li>
          <li>A load cell circuit to measure the weight of the cookie jar and its contents.</li>
          <li>An Arduino DUE as the microcontroller that will process and send the measurements between different modules of the cookie jar system.</li>
          <li>A WiFi Shield that will receive data from the Arduino and transmit the data to the web server via a HTTP request to the Internet. The WiFi shield will connect to a wireless modem with a preset SSID and WPA2 key which is editable in the .ino file. </li>
          <li>A web server that will run a web application that will be implemented using Ruby on Rails.</li>
          <li>A PostgreSQL database that will store the data sent from the physical components of the system. The data from this database will be displayed on the web application. </li>
        </ol>

        <p>Since the system is connected to the Internet both local and external users will be able to access the web application online.</p>

        <center><p><img src ="img/design_diagram.png">Figure 1: Design Diagram of the WiFi Cookie Jar System</img></p></center>

        <hr>
        <h3>Anticipated Difficulties</h3>
        <p>The load cell and the instrumentation amplifier(INA126PA) are both connected to the 5v source of the Arduino. The output of the load cell is fed into the instrumentation amplifier which has a gain of G = 5 + 80kΩ/Rg, where Rg is the chosen 68 resistor. This sets G = 1176.47 V/V. The amplified signal (pin 6 of INA126PA) is then connected to A0(analog input) of the Arduino for processing. Pin 6 of the INA126PA is also connected to a zener diode with Vz = 3.3v to limit the signal, this will prevent damage to the Arduino A0 pin which can only tolerate a maximum voltage of 3.3v.The Arduino then sends the information over the internet through the WiFi module which is connected to  RX1 and TX1 of the Arduino. </p>
      
        <center><p><img src ="img/jar_circuit.png">Figure 2: Schematic of the WiFi Cookie Jar</img></p></center>
      </div>

      <hr>

      <footer>
        <p>Khanh Nguyen and Kevin Nguyen, ELEC3607 Semester 1 2013</p>
      </footer>

    </div> <!-- /container -->





  </body>
</html>

