<?
$subject_val = "Re: [OMPI users] libnuma issue";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Apr 16 08:56:32 2009" -->
<!-- isoreceived="20090416125632" -->
<!-- sent="Thu, 16 Apr 2009 14:56:24 +0200" -->
<!-- isosent="20090416125624" -->
<!-- name="Francesco Pietra" -->
<!-- email="chiendarret_at_[hidden]" -->
<!-- subject="Re: [OMPI users] libnuma issue" -->
<!-- id="b87c422a0904160556w28dc5966pf62c2f5ee7451e55_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="1239849801.8496.7.camel_at_jnysal" -->
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
<strong>Subject:</strong> Re: [OMPI users] libnuma issue<br>
<strong>From:</strong> Francesco Pietra (<em>chiendarret_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-04-16 08:56:24
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8947.php">Jeff Squyres: "[OMPI users] Intel compiler libraries (was: libnuma issue)"</a>
<li><strong>Previous message:</strong> <a href="8945.php">Terry Frankcombe: "Re: [OMPI users] An mpirun question"</a>
<li><strong>In reply to:</strong> <a href="8939.php">Nysal Jan: "Re: [OMPI users] libnuma issue"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8947.php">Jeff Squyres: "[OMPI users] Intel compiler libraries (was: libnuma issue)"</a>
<li><strong>Reply:</strong> <a href="8947.php">Jeff Squyres: "[OMPI users] Intel compiler libraries (was: libnuma issue)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Did not work the way I implemented the suggestion.
<br>
<p>./configure CC=/..cce..icc CXX/. cce..icpc F77=/..fce..ifort
<br>
FC=/..fce..ifort --with-libnuma=/usr --prefix=/usr --enable-static
<br>
<p>./configure CC=/..cce..icc CXX/. cce..icpc F77=/..fce..ifort
<br>
FC=/..fce..ifort --with-libnuma=/usr --prefix=/usr
<br>
then editing Makefile by adding &quot;LDFLAGS = -static-intel&quot;
<br>
<p>./configure CC=/..cce..icc CXX/. cce..icpc F77=/..fce..ifort
<br>
FC=/..fce..ifort --with-libnuma=/usr --prefix=/usr
<br>
then editing Makefile by replacing &quot;LDFLAGS&quot; with &quot;LDFLAGS = -static-intel&quot;
<br>
<p>In all 3 cases orterun error: libimf.so not found (the library was
<br>
sourced with the *.sh intel scripts)
<br>
<p>francesco
<br>
<p>On Thu, Apr 16, 2009 at 4:43 AM, Nysal Jan &lt;jnysal_at_[hidden]&gt; wrote:
<br>
<span class="quotelev1">&gt; You could try statically linking the Intel-provided libraries. Use
</span><br>
<span class="quotelev1">&gt; LDFLAGS=-static-intel
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --Nysal
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Wed, 2009-04-15 at 21:03 +0200, Francesco Pietra wrote:
</span><br>
<span class="quotelev2">&gt;&gt; On Wed, Apr 15, 2009 at 8:39 PM, Prentice Bisbal &lt;prentice_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Francesco Pietra wrote:
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; I used --with-libnuma=/usr since Prentice Bisbal's suggestion and it
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; worked. Unfortunately, I found no way to fix the failure in finding
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; libimf.so when compiling openmpi-1.3.1 with intels, as you have seen
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; in other e-mail from me. And gnu compilers (which work well with both
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; openmpi and the slower code of my application) are defeated by the
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; faster code of my application. With limited hardware resources, I must
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; rely on that 40% speeding up.
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; To fix the libimf.so problem you need to include the path to Intel's
</span><br>
<span class="quotelev3">&gt;&gt; &gt; libimf.so in your LD_LIBRARY_PATH environment variable. On my system, I
</span><br>
<span class="quotelev3">&gt;&gt; &gt; installed v11.074 of the Intel compilers in /usr/local/intel, so my
</span><br>
<span class="quotelev3">&gt;&gt; &gt; libimf.so file is located here:
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; /usr/local/intel/Compiler/11.0/074/lib/intel64/libimf.so
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; So I just add that to my LD_LIBRARY_PATH:
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; LD_LIBRARY_PATH=/usr/local/intel/Compiler/11.0/074/lib/intel64:$LD_LIBRARY_PATH
</span><br>
<span class="quotelev3">&gt;&gt; &gt; export LD_LIBRARY_PATH
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Just a clarification: With my system I use the latest intels version
</span><br>
<span class="quotelev2">&gt;&gt; 10, 10.1.2.024, and mkl 10.1.2.024 because it proved difficult to make
</span><br>
<span class="quotelev2">&gt;&gt; a debian package with version 11. At
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; echo $LD_LIBRARY_PATH
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; /opt/intel/mkl/10.1.2.024/lib/em64t:/opt/intel/cce/10.1.022/lib:opt/intel/fce/10.1.022/lib:/usr/local/lib
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; (that /lib contains libimf.so)
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; That results from sourcing in my .bashrc:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; . /opt/intel/fce/10.1.022/bin/ifortvars.sh
</span><br>
<span class="quotelev2">&gt;&gt; . /opt/intel/cce/10.1.022/bin/iccvars.sh
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &#194;&#160;Did you suppress that sourcing before exporting the LD_EXPORT_PATH to
</span><br>
<span class="quotelev2">&gt;&gt; the library at issue? Having so much turned around the proble, it is
</span><br>
<span class="quotelev2">&gt;&gt; not unlikely that I am messing myself.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; thanks
</span><br>
<span class="quotelev2">&gt;&gt; francesco
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Now I can run whatever programs need libimf.so without any problems. In
</span><br>
<span class="quotelev3">&gt;&gt; &gt; your case, you'll want to that before your make command.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Here's exactly what I use to compile OpenMPI with the Intel Compilers:
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; export PATH=/usr/local/intel/Compiler/11.0/074/bin/intel64:$PATH
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; export
</span><br>
<span class="quotelev3">&gt;&gt; &gt; LD_LIBRARY_PATH=/usr/local/intel/Compiler/11.0/074/lib/intel64:$LD_LIBRARY_PATH
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; ../configure CC=icc CXX=icpc F77=ifort FC=ifort
</span><br>
<span class="quotelev3">&gt;&gt; &gt; --prefix=/usr/local/openmpi-1.2.8/intel-11/x86_64 --disable-ipv6
</span><br>
<span class="quotelev3">&gt;&gt; &gt; --with-sge --with-openib --enable-static
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; --
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Prentice
</span><br>
<span class="quotelev3">&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt; &gt; users mailing list
</span><br>
<span class="quotelev3">&gt;&gt; &gt; users_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
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
<span class="quotelev1">&gt;
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8947.php">Jeff Squyres: "[OMPI users] Intel compiler libraries (was: libnuma issue)"</a>
<li><strong>Previous message:</strong> <a href="8945.php">Terry Frankcombe: "Re: [OMPI users] An mpirun question"</a>
<li><strong>In reply to:</strong> <a href="8939.php">Nysal Jan: "Re: [OMPI users] libnuma issue"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8947.php">Jeff Squyres: "[OMPI users] Intel compiler libraries (was: libnuma issue)"</a>
<li><strong>Reply:</strong> <a href="8947.php">Jeff Squyres: "[OMPI users] Intel compiler libraries (was: libnuma issue)"</a>
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
