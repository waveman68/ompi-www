<?
$subject_val = "Re: [OMPI users] OpenMPI 1.3.1 rpm build error";
include("../../include/msg-header.inc");
?>
<!-- received="Sun Mar  1 16:54:42 2009" -->
<!-- isoreceived="20090301215442" -->
<!-- sent="Sun, 1 Mar 2009 23:54:38 +0200" -->
<!-- isosent="20090301215438" -->
<!-- name="Lenny Verkhovsky" -->
<!-- email="lenny.verkhovsky_at_[hidden]" -->
<!-- subject="Re: [OMPI users] OpenMPI 1.3.1 rpm build error" -->
<!-- id="453d39990903011354s45558c40l525321f7358a29a7_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="74E5E1F6-D84B-4A26-A958-8592821D8E3B_at_cisco.com" -->
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
<strong>From:</strong> Lenny Verkhovsky (<em>lenny.verkhovsky_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-03-01 16:54:38
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8260.php">Brett Pemberton: "Re: [OMPI users] openib RETRY EXCEEDED ERROR"</a>
<li><strong>Previous message:</strong> <a href="../../2009/02/8258.php">Ganesh: "[OMPI users] Verification tool for MPI  C programs available"</a>
<li><strong>In reply to:</strong> <a href="../../2009/02/8163.php">Jeff Squyres: "Re: [OMPI users] OpenMPI 1.3.1 rpm build error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8264.php">Jeff Squyres: "Re: [OMPI users] OpenMPI 1.3.1 rpm build error"</a>
<li><strong>Reply:</strong> <a href="8264.php">Jeff Squyres: "Re: [OMPI users] OpenMPI 1.3.1 rpm build error"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
We saw the same problem with compilation,
<br>
the  workaround for us was configuring without vt (  ./configure --help ).
<br>
I hope vt guys will fix it somewhen .
<br>
<p>Lenny.
<br>
<p>On Mon, Feb 23, 2009 at 11:48 PM, Jeff Squyres &lt;jsquyres_at_[hidden]&gt; wrote:
<br>
<span class="quotelev1">&gt; It would be interesting to see what happens with the 1.3 build.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; It's hard to interpret the output of your user's test program without
</span><br>
<span class="quotelev1">&gt; knowing exactly what that printf means...
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Feb 23, 2009, at 4:44 PM, Jim Kusznir wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I haven't had time to do the openmpi build from the nightly yet, but
</span><br>
<span class="quotelev2">&gt;&gt; my user has run some more tests and now has a simple program and
</span><br>
<span class="quotelev2">&gt;&gt; algorithm to &quot;break&quot; openmpi. &#160;His notes:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; hey, just fyi, I can reproduce the error readily in a simple test case
</span><br>
<span class="quotelev2">&gt;&gt; my &quot;way to break mpi&quot; is as follows: Master proc runs MPI_Send 1000
</span><br>
<span class="quotelev2">&gt;&gt; times to each child, then waits for a &quot;I got it&quot; ack from each child.
</span><br>
<span class="quotelev2">&gt;&gt; Each child receives 1000 numbers from the Master, then sends &quot;I got
</span><br>
<span class="quotelev2">&gt;&gt; it&quot; to the master
</span><br>
<span class="quotelev2">&gt;&gt; running this on 25 nodes causes it to break about 60% of the time
</span><br>
<span class="quotelev2">&gt;&gt; interestingly, it usually breaks on the same process number each time
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; ah. It looks like if I let it sit for about 5 minutes, sometimes it
</span><br>
<span class="quotelev2">&gt;&gt; will work. From my log
</span><br>
<span class="quotelev2">&gt;&gt; rank: 23 Mon Feb 23 13:29:44 2009 recieved 816
</span><br>
<span class="quotelev2">&gt;&gt; rank: 23 Mon Feb 23 13:29:44 2009 recieved 817
</span><br>
<span class="quotelev2">&gt;&gt; rank: 23 Mon Feb 23 13:29:44 2009 recieved 818
</span><br>
<span class="quotelev2">&gt;&gt; rank: 23 Mon Feb 23 13:33:08 2009 recieved 819
</span><br>
<span class="quotelev2">&gt;&gt; rank: 23 Mon Feb 23 13:33:08 2009 recieved 820
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Any thoughts on this problem?
</span><br>
<span class="quotelev2">&gt;&gt; (this is the only reason I'm currently working on upgrading openmpi)
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; --Jim
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Fri, Feb 20, 2009 at 1:59 PM, Jeff Squyres &lt;jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; There won't be an official SRPM until 1.3.1 is released.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; But to test if 1.3.1 is on-track to deliver a proper solution to you, can
</span><br>
<span class="quotelev3">&gt;&gt;&gt; you try a nightly tarball, perhaps in conjunction with our &quot;buildrpm.sh&quot;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; script?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="https://svn.open-mpi.org/source/xref/ompi_1.3/contrib/dist/linux/buildrpm.sh">https://svn.open-mpi.org/source/xref/ompi_1.3/contrib/dist/linux/buildrpm.sh</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; It should build a trivial SRPM for you from the tarball. &#160;You'll likely
</span><br>
<span class="quotelev3">&gt;&gt;&gt; need
</span><br>
<span class="quotelev3">&gt;&gt;&gt; to get the specfile, too, and put it in the same dir as buildrpm.sh. &#160;The
</span><br>
<span class="quotelev3">&gt;&gt;&gt; specfile is in the same SVN directory:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="https://svn.open-mpi.org/source/xref/ompi_1.3/contrib/dist/linux/openmpi.spec">https://svn.open-mpi.org/source/xref/ompi_1.3/contrib/dist/linux/openmpi.spec</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Feb 20, 2009, at 3:51 PM, Jim Kusznir wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; As long as I can still build the rpm for it and install it via rpm.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I'm running it on a ROCKS cluster, so it needs to be an RPM to get
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; pushed out to the compute nodes.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --Jim
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Fri, Feb 20, 2009 at 11:30 AM, Jeff Squyres &lt;jsquyres_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Feb 20, 2009, at 2:20 PM, Jim Kusznir wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; I just went to www.open-mpi.org, went to download, then source rpm.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Looks like it was actually 1.3-1. &#160;Here's the src.rpm that I pulled
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; in:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/software/ompi/v1.3/downloads/openmpi-1.3-1.src.rpm">http://www.open-mpi.org/software/ompi/v1.3/downloads/openmpi-1.3-1.src.rpm</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Ah, gotcha. &#160;Yes, that's 1.3.0, SRPM version 1. &#160;We didn't make up this
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; nomenclature. &#160;:-(
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; The reason for this upgrade is it seems a user found some bug that may
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; be in the OpenMPI code that results in occasionally an MPI_Send()
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; message getting lost. &#160;He's managed to reproduce it multiple times,
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; and we can't find anything in his code that can cause it...He's got
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; logs of mpi_send() going out, but the matching mpi_receive() never
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; getting anything, thus killing his code. &#160;We're currently running
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 1.2.8 with ofed support (Haven't tried turning off ofed, etc. yet).
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Ok. &#160;1.3.x is much mo' betta' then 1.2 in many ways. &#160;We could probably
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; help
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; track down the problem, but if you're willing to upgrade to 1.3.x,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; it'll
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; hopefully just make the problem go away.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Can you try a 1.3.1 nightly tarball?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Cisco Systems
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Cisco Systems
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; users mailing list
</span><br>
<span class="quotelev2">&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; Cisco Systems
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
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8260.php">Brett Pemberton: "Re: [OMPI users] openib RETRY EXCEEDED ERROR"</a>
<li><strong>Previous message:</strong> <a href="../../2009/02/8258.php">Ganesh: "[OMPI users] Verification tool for MPI  C programs available"</a>
<li><strong>In reply to:</strong> <a href="../../2009/02/8163.php">Jeff Squyres: "Re: [OMPI users] OpenMPI 1.3.1 rpm build error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8264.php">Jeff Squyres: "Re: [OMPI users] OpenMPI 1.3.1 rpm build error"</a>
<li><strong>Reply:</strong> <a href="8264.php">Jeff Squyres: "Re: [OMPI users] OpenMPI 1.3.1 rpm build error"</a>
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
