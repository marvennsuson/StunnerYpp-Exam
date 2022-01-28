<!-- Core scripts -->
<script src="{{asset('/system/js/pace.js')}}"></script>
<script src="{{asset('/system/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('/system/libs/popper/popper.js')}}"></script>
<script src="{{asset('/system/js/bootstrap.js')}}"></script>
<script src="{{asset('/system/js/sidenav.js')}}"></script>
<script src="{{asset('/system/js/layout-helpers.js')}}"></script>
<script src="{{asset('/system/js/material-ripple.js')}}"></script>

<!-- Libs -->
<script src="{{asset('/system/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('/system/libs/eve/eve.js')}}"></script>
<script src="{{asset('/system/libs/flot/flot.js')}}"></script>
<script src="{{asset('/system/libs/flot/curvedLines.js')}}"></script>
<script src="{{asset('/system/libs/chart-am4/core.js')}}"></script>
<script src="{{asset('/system/libs/chart-am4/charts.js')}}"></script>
<script src="{{asset('/system/libs/chart-am4/animated.js')}}"></script>

<!-- Demo -->
<script src="{{asset('/system/js/demo.js')}}"></script>
<script src="{{asset('/system/js/analytics.js')}}"></script>
{{-- <script src="{{asset('/system/js/pages/dashboards_index.js')}}"></script> --}}

<script>
    // $(document).ready(function(){
        const links = document.getElementsByClassName('sidenav-link');
        
        for(let link of links)
        {
            if(window.location.href == link.href)
            {
                if(link.parentNode.parentNode.classList.contains('sidenav-menu'))
                {
                    link.parentNode.parentNode.parentNode.classList.add('active');
                    link.parentNode.classList.add('active');
                }
                else
                {
                    link.parentElement.classList.add('active');
                }
            }
        }
    // });
</script>