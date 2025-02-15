<?
$subject_val = "Re: [hwloc-devel] Use of &lt;malloc.h&gt;";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jan 10 12:26:24 2014" -->
<!-- isoreceived="20140110172624" -->
<!-- sent="Fri, 10 Jan 2014 17:26:23 +0000" -->
<!-- isosent="20140110172623" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [hwloc-devel] Use of &amp;lt;malloc.h&amp;gt;" -->
<!-- id="C1FAC811-1B4F-493E-8B7F-C0B68EDE2EAB_at_cisco.com" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="52D02CED.2070703_at_inria.fr" -->
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
<strong>Subject:</strong> Re: [hwloc-devel] Use of &lt;malloc.h&gt;<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-01-10 12:26:23
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4028.php">MPI Team: "[hwloc-devel] Create success (hwloc git dev-34-g5198d4c)"</a>
<li><strong>Previous message:</strong> <a href="4026.php">Brice Goglin: "Re: [hwloc-devel] Use of &lt;malloc.h&gt;"</a>
<li><strong>In reply to:</strong> <a href="4026.php">Brice Goglin: "Re: [hwloc-devel] Use of &lt;malloc.h&gt;"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Sweet; thanks.
<br>
<p>On Jan 10, 2014, at 12:25 PM, Brice Goglin &lt;Brice.Goglin_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Looks like we're good.
</span><br>
<span class="quotelev1">&gt; Brice
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Le 10/01/2014 18:05, Jeff Squyres (jsquyres) a &#233;crit :
</span><br>
<span class="quotelev2">&gt;&gt; K, will do.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Jan 10, 2014, at 12:00 PM, Brice Goglin &lt;brice.goglin_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Push it to master, we'll what regression testing at <a href="https://ci.inria.fr/hwloc/job/master-1-check/">https://ci.inria.fr/hwloc/job/master-1-check/</a> thinks about it
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Brice
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; &quot;Jeff Squyres (jsquyres)&quot; &lt;jsquyres_at_[hidden]&gt; a &#233;crit :
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Brice / Samuel --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; In <a href="http://www.open-mpi.org/community/lists/devel/2014/01/13619.php">http://www.open-mpi.org/community/lists/devel/2014/01/13619.php</a>, Paul Hargrove found this compiler warning:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -----
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On OpenBSD the header malloc.h exists, but is NOT intended to be used:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -bash-4.2$ grep -B2 'is obsolete' make.log 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; CC       bind.lo
</span><br>
<span class="quotelev3">&gt;&gt;&gt; In file included from /home/phargrov/OMPI/openmpi-1.7-latest-openbsd5-amd64/openmpi-1.7.4rc2r30168/opal/mca/hwloc/hwloc172/hwloc/src/bind.c:17:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; /usr/include/malloc.h:4:2: warning: #warning &quot;&lt;malloc.h&gt; is obsolete, use &lt;stdlib.h&gt;&quot;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -----
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; What do you think of this patch (or something like it)?
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; diff --git a/src/bind.c b/src/bind.c
</span><br>
<span class="quotelev3">&gt;&gt;&gt; index 046b7cf..37921bc 100644
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --- a/src/bind.c
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +++ b/src/bind.c
</span><br>
<span class="quotelev3">&gt;&gt;&gt; @@ -13,8 +13,9 @@
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #ifdef HAVE_SYS_MMAN_H
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #  include &lt;sys/mman.h&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #endif
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -#ifdef HAVE_MALLOC_H
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; include &lt;malloc.h&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +/* &lt;malloc.h&gt; is only needed if we don't have posix_memalign() */
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#if defined(hwloc_getpagesize) &amp;&amp; !defined(HAVE_POSIX_MEMALIGN) &amp;&amp; defined(HAVE_MEMALIGN) &amp;&amp; defined(HAVE_MALLOC_H)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#include &lt;malloc.h&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #endif
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #ifdef HAVE_UNISTD_H
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #include &lt;unistd.h&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc-devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; hwloc-devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; hwloc-devel mailing list
</span><br>
<span class="quotelev1">&gt; hwloc-devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4028.php">MPI Team: "[hwloc-devel] Create success (hwloc git dev-34-g5198d4c)"</a>
<li><strong>Previous message:</strong> <a href="4026.php">Brice Goglin: "Re: [hwloc-devel] Use of &lt;malloc.h&gt;"</a>
<li><strong>In reply to:</strong> <a href="4026.php">Brice Goglin: "Re: [hwloc-devel] Use of &lt;malloc.h&gt;"</a>
<!-- nextthread="start" -->
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
