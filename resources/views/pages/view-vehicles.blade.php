@include("components.header")

<body>

 @include("components.topnav")
 @include("components.sidebar")

 <main id="main" class="main">

   <div class="pagetitle">
     <h1>Vehicle</h1>
     <nav>
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="index.html">Home</a></li>
         <li class="breadcrumb-item active">Vehicles</li>
       </ol>
     </nav>
   </div><!-- End Page Title -->

   <section class="section dashboard">
     <div class="card">
        <div class="card-header">
            <b>List of Expenses</b>
           
        </div>
         <table class="table table-condensed table-bordered table-hover datatable no-footer">
           <thead>
             <tr>
               <th>Name</th>
               <th>Ext.</th>
               <th>City</th>
               <th data-type="date" data-format="YYYY/MM/DD">Start Date</th>
               <th>Completion</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td>Unity Pugh</td>
               <td>9958</td>
               <td>Curicó</td>
               <td>2005/02/11</td>
               <td>37%</td>
             </tr>
             <tr>
               <td>Theodore Duran</td>
               <td>8971</td>
               <td>Dhanbad</td>
               <td>1999/04/07</td>
               <td>97%</td>
             </tr>
             <tr>
               <td>Kylie Bishop</td>
               <td>3147</td>
               <td>Norman</td>
               <td>2005/09/08</td>
               <td>63%</td>
             </tr>
             <tr>
               <td>Willow Gilliam</td>
               <td>3497</td>
               <td>Amqui</td>
               <td>2009/11/29</td>
               <td>30%</td>
             </tr>
             <tr>
               <td>Blossom Dickerson</td>
               <td>5018</td>
               <td>Kempten</td>
               <td>2006/09/11</td>
               <td>17%</td>
             </tr>
             <tr>
               <td>Elliott Snyder</td>
               <td>3925</td>
               <td>Enines</td>
               <td>2006/08/03</td>
               <td>57%</td>
             </tr>
             <tr>
               <td>Castor Pugh</td>
               <td>9488</td>
               <td>Neath</td>
               <td>2014/12/23</td>
               <td>93%</td>
             </tr>
             <tr>
               <td>Pearl Carlson</td>
               <td>6231</td>
               <td>Cobourg</td>
               <td>2014/08/31</td>
               <td>100%</td>
             </tr>
             <!-- Add more rows as needed -->
           </tbody>
         </table>
     </div>
   </section>
 </main>
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="assets/vendor/chart.js/chart.umd.js"></script>
 <script src="assets/vendor/echarts/echarts.min.js"></script>
 <script src="assets/vendor/quill/quill.min.js"></script>
 <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
 <script src="assets/vendor/tinymce/tinymce.min.js"></script>
 <script src="assets/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="assets/js/main.js"></script>


</body>
