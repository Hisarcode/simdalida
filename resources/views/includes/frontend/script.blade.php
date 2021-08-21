<!-- Jquery JS -->
<script src="{{ url('front/js/jquery.min.js') }}"></script>
<script src="{{ url('front/js/jquery-migrate-3.0.0.js') }}"></script>
<!-- Popper JS -->
<script src="{{ url('front/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ url('front/js/bootstrap.min.js') }}"></script>
<!-- Modernizr JS -->
<script src="{{ url('front/js/modernizr.min.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ url('front/js/scrollup.js') }}"></script>
<!-- FacnyBox JS -->
<script src="{{ url('front/js/jquery-fancybox.min.js') }}"></script>
<!-- Cube Portfolio JS -->
<script src="{{ url('front/js/cubeportfolio.min.js') }}"></script>
<!-- Slick Nav JS -->
<script src="{{ url('front/js/slicknav.min.js') }}"></script>
<!-- Way Points JS -->
<script src="{{ url('front/js/waypoints.min.js') }}"></script>
<!-- CounterUp JS -->
<script src="{{ url('front/js/jquery.counterup.min.js') }}"></script>
<!-- Slick Nav JS -->
<script src="{{ url('front/js/slicknav.min.js') }}"></script>
<!-- Slick Slider JS -->
<script src="{{ url('front/js/owl-carousel.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ url('front/js/easing.js') }}"></script>
<!-- Magnipic Popup JS -->
<script src="{{ url('front/js/magnific-popup.min.js') }}"></script>
<!-- Active JS -->
<script src="{{ url('front/js/active.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/js/demo/datatables-demo.js') }}"></script>

<script>
    const chatBtn = document.querySelector('.chat-btn');
    const popup = document.querySelector('.chat-popup');

    chatBtn.addEventListener('click', ()=>{
        popup.classList.toggle('show');
    })
</script>