<?php require "includes/header.php";?>
<?php require "config/config.php";?>


<?php
 $res =$conn->query("SELECT * FROM candidates");
 $res-> execute();

 $candidates = $res->fetchAll();




// ?>  

<body class="candidate-body">
    <h1>All Candidates</h1>
    <table>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Position</th>
            <th>Course</th>
            <th>Votes</th>
        </tr>
        <?php 
        foreach ($candidates as $candidate) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $candidate['id']; ?>.</td>
                    <td><?php echo $candidate['name']; ?></td>
                    <td><?php echo $candidate['position']; ?></td>
                    <td><?php echo $candidate['course']; ?></td>
                    <td><?php echo $candidate['votes']; ?></td>
                  
                </tr>  

                    <?php }
                    ?>
            </tbody>
            
        
            
     
    </table>
    
        
</body>

</html>