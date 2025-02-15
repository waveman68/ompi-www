<?
$subject_val = "Re: [OMPI users] mpicc command not found - Fedora";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Mar 29 14:05:37 2012" -->
<!-- isoreceived="20120329180537" -->
<!-- sent="Thu, 29 Mar 2012 23:35:32 +0530" -->
<!-- isosent="20120329180532" -->
<!-- name="Amit Ghadge" -->
<!-- email="amitg.aap_at_[hidden]" -->
<!-- subject="Re: [OMPI users] mpicc command not found - Fedora" -->
<!-- id="CAMALRjgx3EVhttj88+yR=LG-3TUYK88KBwzRC9JsSNvb3HZsjg_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="8899B286-6450-4163-B7E3-F9F51D9E9B23_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI users] mpicc command not found - Fedora<br>
<strong>From:</strong> Amit Ghadge (<em>amitg.aap_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-03-29 14:05:32
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18875.php">Josh Hursey: "Re: [OMPI users] Segmentation fault when checkpointing"</a>
<li><strong>Previous message:</strong> <a href="18873.php">Linton, Tom: "[OMPI users] Segmentation fault when checkpointing"</a>
<li><strong>In reply to:</strong> <a href="18870.php">Jeffrey Squyres: "Re: [OMPI users] mpicc command not found - Fedora"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18883.php">Rohan Deshpande: "Re: [OMPI users] mpicc command not found - Fedora"</a>
<li><strong>Reply:</strong> <a href="18883.php">Rohan Deshpande: "Re: [OMPI users] mpicc command not found - Fedora"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
You can try source packaged. Extract and run command ./configure
<br>
--prefix=usr/local , make all , make install after to compile any mpi
<br>
program by using mpicc
<br>
On 29-Mar-2012 7:26 PM, &quot;Jeffrey Squyres&quot; &lt;jsquyres_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; I don't know exactly how Fedora packages Open MPI, but I've seen some
</span><br>
<span class="quotelev1">&gt; distributions separate Open MPI into a base package and a &quot;devel&quot; package.
</span><br>
<span class="quotelev1">&gt;  And mpicc (and some friends) are split off into that &quot;devel&quot; package.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The rationale is that you don't need mpicc (and friends) to *run* Open MPI
</span><br>
<span class="quotelev1">&gt; applications -- you only need mpicc (etc.) to *develop* Open MPI
</span><br>
<span class="quotelev1">&gt; applications.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Poke around and see if you can find a devel-like Open MPI package in
</span><br>
<span class="quotelev1">&gt; Fedora.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Mar 29, 2012, at 7:45 AM, Rohan Deshpande wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; Hi,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I have installed mpi successfully on fedora using yum install openmpi
</span><br>
<span class="quotelev1">&gt; openmpi-devel openmpi-libs
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I have also added /usr/lib/openmpi/bin to PATH and LD_LIBRARY_PATH
</span><br>
<span class="quotelev1">&gt; variable.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; But when I try to complie my program using mpicc hello.c or
</span><br>
<span class="quotelev1">&gt; /usr/lib/openmpi/bin/mpicc hello.c I get error saying mpicc: command not
</span><br>
<span class="quotelev1">&gt; found
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I checked the contents of /user/lib/openmpi/bin and there is no mpicc...
</span><br>
<span class="quotelev1">&gt; here is the screenshot
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;     &lt;image.png&gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; The add/remove  programs show the installation details
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;  &lt;image.png&gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I have tried re installing but same thing happened.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Can someone help me to solve this issue?
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Thanks
</span><br>
<span class="quotelev2">&gt; &gt; --
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Best Regards,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; ROHAN
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; users mailing list
</span><br>
<span class="quotelev2">&gt; &gt; users_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-18874/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18875.php">Josh Hursey: "Re: [OMPI users] Segmentation fault when checkpointing"</a>
<li><strong>Previous message:</strong> <a href="18873.php">Linton, Tom: "[OMPI users] Segmentation fault when checkpointing"</a>
<li><strong>In reply to:</strong> <a href="18870.php">Jeffrey Squyres: "Re: [OMPI users] mpicc command not found - Fedora"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18883.php">Rohan Deshpande: "Re: [OMPI users] mpicc command not found - Fedora"</a>
<li><strong>Reply:</strong> <a href="18883.php">Rohan Deshpande: "Re: [OMPI users] mpicc command not found - Fedora"</a>
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
