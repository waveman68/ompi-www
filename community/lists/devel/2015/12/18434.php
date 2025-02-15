<?
$subject_val = "Re: [OMPI devel] [1.10.2rc2] configure failure with xlf and FCFLAGS=-q32";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Dec 21 09:35:53 2015" -->
<!-- isoreceived="20151221143553" -->
<!-- sent="Sat, 19 Dec 2015 13:25:01 -0800" -->
<!-- isosent="20151219212501" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [1.10.2rc2] configure failure with xlf and FCFLAGS=-q32" -->
<!-- id="CAAvDA14yEFB=_0o42pETAaFZaLOjAn-Mf5drmBfjPs7t_fAodw_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="CAAvDA17phzHurBDdsxCX8r6MSx_GdWEm=0w6EOUGAirmEQ_RBg_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [1.10.2rc2] configure failure with xlf and FCFLAGS=-q32<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-12-19 16:25:01
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18435.php">Paul Hargrove: "[OMPI devel] [1.10.2rc2] configure failure with xlf and FCFLAGS=-q32"</a>
<li><strong>Previous message:</strong> <a href="18433.php">Marco Atzeri: "Re: [OMPI devel] Open MPI v1.10.2rc1 available"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I have confirmed identical failures of the 2.0.0rc1 and master tarballs.
<br>
-Paul
<br>
<p>On Sat, Dec 19, 2015 at 12:50 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; I am testing on a system with IBM's compilers which has worked for both
</span><br>
<span class="quotelev1">&gt; LP64 ({C,CXX,F}FLAGS=-q64) and ILP32 ({C,CXX,FC}FLAGS=-q32) builds on all
</span><br>
<span class="quotelev1">&gt; past releases.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; With the 1.10.2rc2 tarball, however, I see the following in the configure
</span><br>
<span class="quotelev1">&gt; output on the ILP32  configuration:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; checking if Fortran compiler and POSIX threads work with -lpthread... no
</span><br>
<span class="quotelev1">&gt; configure: error: Can not find working threads configuration.  aborting
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Examining the config.log (below) shows this test has run the Fortran
</span><br>
<span class="quotelev1">&gt; compiler *without* FCFLAGS (-q32).
</span><br>
<span class="quotelev1">&gt; The result is a failed attempt to link 32-bit and 64-bit object files
</span><br>
<span class="quotelev1">&gt; together:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; configure:64264: checking if Fortran compiler and POSIX threads work with
</span><br>
<span class="quotelev1">&gt; -lpthread
</span><br>
<span class="quotelev1">&gt; configure:64345: xlc -q32 -g -I. -c conftest.c
</span><br>
<span class="quotelev1">&gt; &quot;conftest.c&quot;, line 27.18: 1506-280 (W) Function argument assignment
</span><br>
<span class="quotelev1">&gt; between types &quot;unsigned long&quot; and &quot;unsigned long*&quot; is not allowed.
</span><br>
<span class="quotelev1">&gt; configure:64352: $? = 0
</span><br>
<span class="quotelev1">&gt; configure:64362: xlf  conftestf.f conftest.o -o conftest  -lutil  -lpthread
</span><br>
<span class="quotelev1">&gt; ** fpthread   === End of Compilation 1 ===
</span><br>
<span class="quotelev1">&gt; 1501-510  Compilation successful for file conftestf.f.
</span><br>
<span class="quotelev1">&gt; /usr/bin/ld: powerpc:common architecture of input file `conftest.o' is
</span><br>
<span class="quotelev1">&gt; incompatible with powerpc:common64 output
</span><br>
<span class="quotelev1">&gt; conftest.o: In function `pthreadtest_f':
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:23:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against `pthread_self'
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:24:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against `pthread_attr_init'
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:25:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against `__sigsetjmp'
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:25:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against `__pthread_unwind_next'
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:25:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against `__pthread_register_cancel'
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:26:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against `pthread_create'
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:27:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against `pthread_join'
</span><br>
<span class="quotelev1">&gt; /gpfs/vesta-fs0/projects/PARTS/hargrove/OMPI/openmpi-1.10.2rc1-linux-ppc32-xlc-12.1/BLD/conftest.c:28:
</span><br>
<span class="quotelev1">&gt; relocation truncated to fit: R_PPC_REL24 against
</span><br>
<span class="quotelev1">&gt; `__pthread_unregister_cancel'
</span><br>
<span class="quotelev1">&gt; configure:64369: $? = 1
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Note that tests of the Fortran compiler prior to the failure *are* passing
</span><br>
<span class="quotelev1">&gt; &quot;-q32&quot;:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; configure:32543: checking if Fortran compiler works
</span><br>
<span class="quotelev1">&gt; configure:32572: xlf -o conftest -q32 -g   conftest.f  &gt;&amp;5
</span><br>
<span class="quotelev1">&gt; ** main   === End of Compilation 1 ===
</span><br>
<span class="quotelev1">&gt; 1501-510  Compilation successful for file conftest.f.
</span><br>
<span class="quotelev1">&gt; configure:32572: $? = 0
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; So, I don't believe this is anything specific to XLF, but rather an issue
</span><br>
<span class="quotelev1">&gt; that would appear on any system with a non-default ABI specified in
</span><br>
<span class="quotelev1">&gt; {C,CXX,F}FLAGS.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I have *not* had the opportunity to test either master or the 2.0 RC on
</span><br>
<span class="quotelev1">&gt; this platform.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Computer Languages &amp; Systems Software (CLaSS) Group
Computer Science Department               Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-18434/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18435.php">Paul Hargrove: "[OMPI devel] [1.10.2rc2] configure failure with xlf and FCFLAGS=-q32"</a>
<li><strong>Previous message:</strong> <a href="18433.php">Marco Atzeri: "Re: [OMPI devel] Open MPI v1.10.2rc1 available"</a>
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
