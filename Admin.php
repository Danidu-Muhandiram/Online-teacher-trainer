<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:wght@100;208;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="Admin.css">

</head>

<body>
    <div class="grid-container">

        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icon-outlined">menu</span>
            </div>
            <h2 style="text-align: center; width: 100%;">-INSIGHT-</h2>
            
        </header>
        <aside id="sidebar">            
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">category</span> Categories
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">groups</span> Users
                </li>                
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">poll</span> Reports
                </li>
                <li class="sidebar-list-item">
                    <a href="Update_Blog.php" style="text-decoration: none; color: inherit;">
                        <span class="material-icons-outlined">newspaper</span> Blog page
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">settings</span> Settings
                </li>
            </ul>
            <div class="sidebar-logout">
                <button class="logout-btn">
                    <span class="material-icons-outlined">logout</span> Logout
                </button>
            </div>
        </aside>
        <main class="main-container">
            

            <div class="main-cards">
                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL COURSES</h3>
                        <span class="material-icons-outlined">library_books</span>
                    </div>
                    <h1>27</h1>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL INCOME</h3>
                        <span class="material-icons-outlined">attach_money</span>
                    </div>
                    <h1>$ 1069</h1>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>NO.OF TRAINERS</h3>
                        <span class="material-icons-outlined">supervisor_account</span>
                    </div>
                    <h1>9</h1>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>NO.OF STUDENTS</h3>
                        <span class="material-icons-outlined">groups</span>
                    </div>
                    <h1>469</h1>
                </div>

                

            </div>
        
            <div class="charts">
                <div class="chart">
                  <center><h2><span style="color: black;">Earnings</span></h2></center>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        <script>
                            const xValues = [0, 1, 2, 3, 4, 5, 6, 7];
                            const yValues = [0, 2, 4.5, 6, 10, 8, 12, 14];
                        
                            new Chart("myChart", 
                            {
                             type: "line",
                             data: {
                             labels: xValues,
                              datasets: [{
                                  backgroundColor: "rgba(0,0,255,0.1)",
                                  borderColor: "rgba(0,0,255,1.0)",
                                 data: yValues
                                }]
                               },
                              options: {
                                 legend: { display: false },
                               scales: 
                              {  
                                 yAxes: [{ ticks: { min: 0, max: 14 } }],
                              }
                               }
                            });
                        </script>                 
                     </div> 
                        <div class="card purple">                            
                            <center><h2><span style="color: rgb(255, 255, 255);">Upcoming Sessions</span></h2></center>                           
                            <center><span class="material-icons-outlined"style="font-size: 180px;">calendar_month</span></center>
                        </div>                                                                                    
                </div>                 
            </div>                
        </main> 
    </div>
    
</body>                           
</html>
