<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <?php 
                $tahun = \Carbon\Carbon::now('Asia/Jakarta')->format('Y'); ?>
            <span>Copyright &copy; Simdalida {{ $tahun }} </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->