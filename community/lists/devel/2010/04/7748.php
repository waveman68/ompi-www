<?
$subject_val = "Re: [OMPI devel] inquiring about openmpi";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Apr 13 10:26:04 2010" -->
<!-- isoreceived="20100413142604" -->
<!-- sent="Tue, 13 Apr 2010 10:26:00 -0400" -->
<!-- isosent="20100413142600" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] inquiring about openmpi" -->
<!-- id="DBDB963D-ABA7-4E2A-AC48-E21ED7ECF26E_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="112441.19950.qm_at_web15307.mail.cnb.yahoo.com" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] inquiring about openmpi<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-04-13 10:26:00
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="7749.php">Jeff Squyres: "Re: [OMPI devel] inquiring about openmpi"</a>
<li><strong>Previous message:</strong> <a href="7747.php">luyang dong: "[OMPI devel] inquiring about openmpi"</a>
<li><strong>In reply to:</strong> <a href="7747.php">luyang dong: "[OMPI devel] inquiring about openmpi"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="7749.php">Jeff Squyres: "Re: [OMPI devel] inquiring about openmpi"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
This is the list for Open MPI developers, not LAM/MPI.  We ex-LAM/MPI developers are on this list, but we're not inclined to answer LAM questions on this list.  :-)  Heck, we're not inclined to answer LAM questions at all, if we can avoid it.  :-) :-) :-)
<br>
<p>Specifically: LAM is pretty dead.  We haven't worked on LAM in *years* (literally).  Indeed, it's probably not useful to try to implement process migration with LAM/MPI.
<br>
<p><p>On Apr 13, 2010, at 10:23 AM, luyang dong wrote:
<br>
<p><span class="quotelev1">&gt; dear teachers:
</span><br>
<span class="quotelev1">&gt;   
</span><br>
<span class="quotelev1">&gt;  LAM/MPI constructs communication channel via process location identified by
</span><br>
<span class="quotelev1">&gt;  type struct _gps in LAM universe. struct _gps{
</span><br>
<span class="quotelev1">&gt;  int4 gps_node;
</span><br>
<span class="quotelev1">&gt;  int4 gps_pid;
</span><br>
<span class="quotelev1">&gt;  int4 gps_idx;
</span><br>
<span class="quotelev1">&gt;  int4 gps_granks;                                                        
</span><br>
<span class="quotelev1">&gt; }. In order to know of other processes, a mpi process in openmpi must possess data structure similar to struct _gps. My motivation is to achieve process migration, so I want to find this structure.
</span><br>
<span class="quotelev1">&gt;  
</span><br>
<span class="quotelev1">&gt;  
</span><br>
<span class="quotelev1">&gt;                                                                             thanks
</span><br>
<span class="quotelev1">&gt;                                                                            luyang dong
</span><br>
<span class="quotelev1">&gt;                                                                            4.13 2010
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;  _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to:
<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="7749.php">Jeff Squyres: "Re: [OMPI devel] inquiring about openmpi"</a>
<li><strong>Previous message:</strong> <a href="7747.php">luyang dong: "[OMPI devel] inquiring about openmpi"</a>
<li><strong>In reply to:</strong> <a href="7747.php">luyang dong: "[OMPI devel] inquiring about openmpi"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="7749.php">Jeff Squyres: "Re: [OMPI devel] inquiring about openmpi"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
