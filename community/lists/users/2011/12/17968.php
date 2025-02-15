<?
$subject_val = "Re: [OMPI users] Error launching w/ 1.5.3 on IB mthca nodes";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Dec 14 15:00:35 2011" -->
<!-- isoreceived="20111214200035" -->
<!-- sent="Wed, 14 Dec 2011 12:00:30 -0800" -->
<!-- isosent="20111214200030" -->
<!-- name="V. Ram" -->
<!-- email="vramml0_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Error launching w/ 1.5.3 on IB mthca nodes" -->
<!-- id="1323892830.30055.140661011692873_at_webmail.messagingengine.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="1323715333.25816.140661010701609_at_webmail.messagingengine.com" -->
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
<strong>Subject:</strong> Re: [OMPI users] Error launching w/ 1.5.3 on IB mthca nodes<br>
<strong>From:</strong> V. Ram (<em>vramml0_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-12-14 15:00:30
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17969.php">Tim Prince: "Re: [OMPI users] openmpi - gfortran and ifort conflict"</a>
<li><strong>Previous message:</strong> <a href="17967.php">Jeff Squyres: "Re: [OMPI users] openmpi - gfortran and ifort conflict"</a>
<li><strong>In reply to:</strong> <a href="17939.php">V. Ram: "[OMPI users] Error launching w/ 1.5.3 on IB mthca nodes"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17985.php">TERRY DONTJE: "Re: [OMPI users] Error launching w/ 1.5.3 on IB mthca nodes"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Open MPI InfiniBand gurus and/or Mellanox: could I please get some
<br>
assistance with this?  Any suggestions on tunables or debugging
<br>
parameters to try?
<br>
<p>Thank you very much.
<br>
<p>On Mon, Dec 12, 2011, at 10:42 AM, V. Ram wrote:
<br>
<span class="quotelev1">&gt; Hello,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; We are running a cluster that has a good number of older nodes with
</span><br>
<span class="quotelev1">&gt; Mellanox IB HCAs that have the &quot;mthca&quot; device name (&quot;ib_mthca&quot; kernel
</span><br>
<span class="quotelev1">&gt; module).
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; These adapters are all at firmware level 4.8.917 .
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The Open MPI in use is 1.5.3 , kernel 2.6.39 , x86-64.  Jobs are
</span><br>
<span class="quotelev1">&gt; launched/managed using Slurm 2.2.7.  The IB software and drivers
</span><br>
<span class="quotelev1">&gt; correspond to OFED 1.5.3.2 , and I've verified that the kernel modules
</span><br>
<span class="quotelev1">&gt; in use are all from this OFED version.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On nodes with the mthca hardware *only*, we get frequent, but
</span><br>
<span class="quotelev1">&gt; intermittent job startup failures, with messages like:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; /////////////////////////////////
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; [[19373,1],54][btl_openib_component.c:3320:handle_wc] from compute-c3-07
</span><br>
<span class="quotelev1">&gt; to: compute-c3-01 error polling LP CQ with status RECEIVER NOT READY
</span><br>
<span class="quotelev1">&gt; RETRY EXCEEDED ERROR status
</span><br>
<span class="quotelev1">&gt; number 13 for wr_id 2a25c200 opcode 128 vendor error 135 qp_idx 0
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; The OpenFabrics &quot;receiver not ready&quot; retry count on a per-peer
</span><br>
<span class="quotelev1">&gt; connection between two MPI processes has been exceeded.  In general,
</span><br>
<span class="quotelev1">&gt; this should not happen because Open MPI uses flow control on per-peer
</span><br>
<span class="quotelev1">&gt; connections to ensure that receivers are always ready when data is
</span><br>
<span class="quotelev1">&gt; sent.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; [further standard error text snipped...]
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Below is some information about the host that raised the error and the
</span><br>
<span class="quotelev1">&gt; peer to which it was connected:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;   Local host:   compute-c3-07
</span><br>
<span class="quotelev1">&gt;   Local device: mthca0
</span><br>
<span class="quotelev1">&gt;   Peer host:    compute-c3-01
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; You may need to consult with your system administrator to get this
</span><br>
<span class="quotelev1">&gt; problem fixed.
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; /////////////////////////////////
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; During these job runs, I have monitored the InfiniBand performance
</span><br>
<span class="quotelev1">&gt; counters on the endpoints and switch.  No telltale counters for any of
</span><br>
<span class="quotelev1">&gt; these ports change during these failed job initiations.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; ibdiagnet works fine and properly enumerates the fabric and related
</span><br>
<span class="quotelev1">&gt; performance counters, both from the affected nodes, as well as other
</span><br>
<span class="quotelev1">&gt; nodes attached to the IB switch.  The IB connectivity itself seems fine
</span><br>
<span class="quotelev1">&gt; from these nodes.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Other nodes with different HCAs use the same InfiniBand fabric
</span><br>
<span class="quotelev1">&gt; continuously without any issue, so I don't think it's the fabric/switch.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I'm at a loss for what to do next to try and find the root cause of the
</span><br>
<span class="quotelev1">&gt; issue.  I suspect something perhaps having to do with the mthca
</span><br>
<span class="quotelev1">&gt; support/drivers, but how can I track this down further?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Thank you,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; V. Ram.
</span><br>
<p><pre>
-- 
<a href="http://www.fastmail.fm">http://www.fastmail.fm</a> - Choose from over 50 domains or use your own
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17969.php">Tim Prince: "Re: [OMPI users] openmpi - gfortran and ifort conflict"</a>
<li><strong>Previous message:</strong> <a href="17967.php">Jeff Squyres: "Re: [OMPI users] openmpi - gfortran and ifort conflict"</a>
<li><strong>In reply to:</strong> <a href="17939.php">V. Ram: "[OMPI users] Error launching w/ 1.5.3 on IB mthca nodes"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17985.php">TERRY DONTJE: "Re: [OMPI users] Error launching w/ 1.5.3 on IB mthca nodes"</a>
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
