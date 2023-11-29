<?php
include("header.php");
?>
<h3>Random Orders - target 10%</h3>

<?php 
// Checking is User Logged In
if(isset($_SESSION['authentication']))
{
    $filename = 'db/spy.json';
    include('rand-table.php');
}
?>

<?php 
    if(!isset($_SESSION['authentication']))
    {
        ?>
        <a href="./login" class="btn btn-primary mt-3">LogIN</a>
        <?php
    }
?>

</div>
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>