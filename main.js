
<script type="text/javascript">
    $(document).ready(function(){
        // Show hide popover
        $(".mobile-menu").click(function(){
            $(this).find(".mobile-menu").slideToggle("fast");
        });
    });
    $(document).on("click", function(event){
        var $trigger = $(".mobile-menu");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".mobile-menu").slideUp("fast");
        }            
    });
</script>