( function( $ ) {
  $(function(){
    var target = $('[data-jobs]');
    
    $.getJSON('https://api.lever.co/v0/postings/alation?mode=json', function(jobs) {
	    
      var teams = [];
      $.each(jobs, function(index, job) {
        var team = job.categories.team,
        		slug = team.replace(/[^A-Za-z0-9]/ig, '');
        		
        if (teams.indexOf(job.categories.team) === -1) {
          teams.push(job.categories.team);
          var org_html = '<dt id="'+ slug +'-team">'+team+'</dt>';
          org_html += '<dd id="'+ slug +'-team-dd"></dd>';
          $(target).append(org_html);
        }
//        console.log(job.text);
        var html = '<a class="block" href="https://alation.com/careers/posting?posting-id=' +job.id + '"><span class="decor">' + job.text + '</span> ' + job.categories.commitment + '</a>';
        
       $("#"+ slug +"-team-dd").append(html);
      });
      $(target).append('<a class="btn line-btn" href="job-alert/"><span>Subscribe to New Opening</span></a>');
    });
  });
})( jQuery);