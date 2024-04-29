<?php if($_SESSION['Logado']): ?>
    <script>
        let logado = true;
    </script>
<?php else: ?>
    <script>
        let logado = false;
    </script>
<?php endif; ?>

<?php 
if(isset($_SESSION['User']['nivel_Usuario'])){
    if($_SESSION['User']['nivel_Usuario'] == 0): ?>
    <script>
        document.getElementById('btnAdm').style.display = 'none';
    </script>
<?php elseif($_SESSION['User']['nivel_Usuario'] == 1): ?>
    <script>
        document.getElementById('btnAdm').style.display = 'block';
    </script>
<?php endif; 
}
?>