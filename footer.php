    </main>

<?php get_sidebar(); ?>
</div>
<footer id="footer" style="width:100%;">

<div id="radio-footer">

    <div id="livestream-play-button" style="position:absolute; top:-75px; left:calc(50% - 75px); pointer-events:auto;">
    	<img id="pb-arrow" style="position:absolute; top:40px; left:40px; height:calc(100% - 80px); width:calc(100% - 80px); object-fit:fill; opacity:0%;" src="/wp-content/themes/BlackSquirrelEntertainment/assets/play-button.png">
    	<div style="position:absolute; top:35px; left:35px; height:calc(100% - 80px); width:calc(100% - 80px); object-fit:fill;" id="lds-spinner" class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    	<iframe style="position:absolute; top:0px; left:0px; width:100%; height:100%; opacity:1%; border-radius:100%;" src="https://video.kent.edu/embed/secure/iframe/entryId/1_ykut3s1i/uiConfId/31544052/st/0" onload="getElementById('lds-spinner').remove();getElementById('pb-arrow').style.opacity = '100%';finishedLoading=true;" async></iframe>
    </div>

    <a href="/radio/ugly-player">Stream not working?</a>

</div>


</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
