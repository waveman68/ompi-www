<?
$subject_val = "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Dec 29 17:32:05 2011" -->
<!-- isoreceived="20111229223205" -->
<!-- sent="Thu, 29 Dec 2011 15:31:55 -0700" -->
<!-- isosent="20111229223155" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL" -->
<!-- id="0CE31967-07A3-46F4-8E12-267B5656AB57_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="CAGR4S9E_it7APe7TC6pSCrGW4MSXYckpeM7ZZ+wHWb5wux9ovw_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-12-29 17:31:55
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18078.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<li><strong>Previous message:</strong> <a href="18076.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<li><strong>In reply to:</strong> <a href="18076.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18078.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<li><strong>Reply:</strong> <a href="18078.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Strange - if you look at your original output, autoconf is identified as 2.50 - a version that is way too old for us. However, what you just sent now shows 2.67, which would be fine.
<br>
<p>Why the difference?
<br>
<p><p>On Dec 29, 2011, at 3:27 PM, Dmitry N. Mikushin wrote:
<br>
<p><span class="quotelev1">&gt; Hi Ralph,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; URL: <a href="http://svn.open-mpi.org/svn/ompi/trunk">http://svn.open-mpi.org/svn/ompi/trunk</a>
</span><br>
<span class="quotelev1">&gt; Repository Root: <a href="http://svn.open-mpi.org/svn/ompi">http://svn.open-mpi.org/svn/ompi</a>
</span><br>
<span class="quotelev1">&gt; Repository UUID: 63e3feb5-37d5-0310-a306-e8a459e722fe
</span><br>
<span class="quotelev1">&gt; Revision: 24785
</span><br>
<span class="quotelev1">&gt; Node Kind: directory
</span><br>
<span class="quotelev1">&gt; Schedule: normal
</span><br>
<span class="quotelev1">&gt; Last Changed Author: rhc
</span><br>
<span class="quotelev1">&gt; Last Changed Rev: 24785
</span><br>
<span class="quotelev1">&gt; Last Changed Date: 2011-06-17 22:01:23 +0400 (Fri, 17 Jun 2011)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 1. Checking tool versions
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;   Searching for autoconf
</span><br>
<span class="quotelev1">&gt;     Found autoconf version 2.67; checking version...
</span><br>
<span class="quotelev1">&gt;       Found version component 2 -- need 2
</span><br>
<span class="quotelev1">&gt;       Found version component 67 -- need 65
</span><br>
<span class="quotelev1">&gt;     ==&gt; ACCEPTED
</span><br>
<span class="quotelev1">&gt;   Searching for libtoolize
</span><br>
<span class="quotelev1">&gt;     Found libtoolize version 2.2.6b; checking version...
</span><br>
<span class="quotelev1">&gt;       Found version component 2 -- need 2
</span><br>
<span class="quotelev1">&gt;       Found version component 2 -- need 2
</span><br>
<span class="quotelev1">&gt;       Found version component 6b -- need 6b
</span><br>
<span class="quotelev1">&gt;     ==&gt; ACCEPTED
</span><br>
<span class="quotelev1">&gt;   Searching for automake
</span><br>
<span class="quotelev1">&gt;     Found automake version 1.11.1; checking version...
</span><br>
<span class="quotelev1">&gt;       Found version component 1 -- need 1
</span><br>
<span class="quotelev1">&gt;       Found version component 11 -- need 11
</span><br>
<span class="quotelev1">&gt;       Found version component 1 -- need 1
</span><br>
<span class="quotelev1">&gt;     ==&gt; ACCEPTED
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 2011/12/30 Ralph Castain &lt;rhc_at_[hidden]&gt;:
</span><br>
<span class="quotelev2">&gt;&gt; Are you doing this on a subversion checkout? Of which branch?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Did you check your autotoll versions to ensure you meet the minimum required levels? The requirements differ by version.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Dec 29, 2011, at 2:52 PM, Dmitry N. Mikushin wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Dear Open MPI Community,
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I need a custom OpenMPI build. While running ./autogen.pl on Debian
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Squeeze, there is an error:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --- Found autogen.sh; running...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; autoreconf2.50: Entering directory `.'
</span><br>
<span class="quotelev3">&gt;&gt;&gt; autoreconf2.50: configure.in: not using Gettext
</span><br>
<span class="quotelev3">&gt;&gt;&gt; autoreconf2.50: running: aclocal --force -I m4
</span><br>
<span class="quotelev3">&gt;&gt;&gt; autoreconf2.50: configure.in: tracing
</span><br>
<span class="quotelev3">&gt;&gt;&gt; autoreconf2.50: configure.in: not using Libtool
</span><br>
<span class="quotelev3">&gt;&gt;&gt; autoreconf2.50: running: /usr/bin/autoconf --force
</span><br>
<span class="quotelev3">&gt;&gt;&gt; configure.in:113: error: possibly undefined macro: AC_PROG_LIBTOOL
</span><br>
<span class="quotelev3">&gt;&gt;&gt;      If this token and others are legitimate, please use m4_pattern_allow.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;      See the Autoconf documentation.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; autoreconf2.50: /usr/bin/autoconf failed with exit status: 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Command failed: ./autogen.sh
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; It's a bit confusing, because automake, libtool, autoconf are
</span><br>
<span class="quotelev3">&gt;&gt;&gt; installed. What might be the other reasons of this error?
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev3">&gt;&gt;&gt; - Dima.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
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
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18078.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<li><strong>Previous message:</strong> <a href="18076.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<li><strong>In reply to:</strong> <a href="18076.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18078.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
<li><strong>Reply:</strong> <a href="18078.php">Dmitry N. Mikushin: "Re: [OMPI users] possibly undefined macro: AC_PROG_LIBTOOL"</a>
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
