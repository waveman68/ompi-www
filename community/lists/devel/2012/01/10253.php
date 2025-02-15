<?
$subject_val = "[OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jan 26 02:49:44 2012" -->
<!-- isoreceived="20120126074944" -->
<!-- sent="Wed, 25 Jan 2012 23:49:27 -0800" -->
<!-- isosent="20120126074927" -->
<!-- name="Paul H. Hargrove" -->
<!-- email="PHHargrove_at_[hidden]" -->
<!-- subject="[OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]" -->
<!-- id="4F210587.8030005_at_lbl.gov" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="4F191605.6060108_at_lbl.gov" -->
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
<strong>Subject:</strong> [OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]<br>
<strong>From:</strong> Paul H. Hargrove (<em>PHHargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-01-26 02:49:27
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10254.php">TERRY DONTJE: "Re: [OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]"</a>
<li><strong>Previous message:</strong> <a href="10252.php">George Bosilca: "Re: [OMPI devel] [PATCH] MPI_FILE_SEEK_SHARED is wrong in Fortran"</a>
<li><strong>In reply to:</strong> <a href="10234.php">Paul H. Hargrove: "[OMPI devel] 1.4.5rc2 Solaris results [libtool problem]"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10254.php">TERRY DONTJE: "Re: [OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]"</a>
<li><strong>Reply:</strong> <a href="10254.php">TERRY DONTJE: "Re: [OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I am pleased to report that w/ help from Terry I can now build nearly 
<br>
everything w/ the Solaris Studio 12.2 and 12.3 compilers.
<br>
Upon comparing our build environments we discovered that CXX=CC works 
<br>
but CXX=sunCC does not, even though they are both symlinks to the same 
<br>
compiler executable.  I still don't know the root cause (though libtool 
<br>
and associated configure logic is still the obvious suspect), but the 
<br>
work around is simple:
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;When using the Solaris Studio compilers on Solaris, one must set 
<br>
CXX=CC rather than  CXX=sunCC.
<br>
<p>So I am following that advice, and have additionally:
<br>
+ gotten  up-to-date patches applied to resolve my FORTRAN and OMP 
<br>
issues on the SPARC-T2 system.
<br>
+ installed both 12.2 and 12.3 compilers on Linux/x86-64
<br>
<p>So, I can now report the following ALL work (defined as &quot;make all check 
<br>
install&quot;) with BOTH 12.2 and 12.3 Solaris Studio compilers.
<br>
The only configure flags are --prefix, setting the CC, CXX, F77 and FC 
<br>
variables, and (when appropriate) setting *FLAGS=-m64.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;solaris-10 s10_69/sun4u (w/ -m64)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;solaris-10 Generic_137111-07/sun4v (w/ -m64)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;solaris-11 snv_151a/amd64 [including ofud, openib and dapl] (w/ -m64)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;linux/x86-64 (no -m64 needed because it is the default)
<br>
<p>The following works w/ the 12.2 compilers:
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;solaris-10 Generic_142901-03/i386
<br>
However, the f77/f90 compilers in 12.3 are generating code using SSE2 
<br>
instructions even when passed -xarch=pentium_pro.
<br>
So this machine cannot run the resulting executables.  So, I had to 
<br>
--disable-mpi-f77 to get things to work.
<br>
That, however, is NOT an OMPI problem.
<br>
<p>-Paul
<br>
<p>On 1/19/2012 11:21 PM, Paul H. Hargrove wrote:
<br>
<span class="quotelev1">&gt; As promised earlier today, here are results from my Solaris platforms.
</span><br>
<span class="quotelev1">&gt; Note that there are libtool-related failures below that may be worth 
</span><br>
<span class="quotelev1">&gt; pursuing.
</span><br>
<span class="quotelev1">&gt; If necessary, access to most of my machines can be arranged for 
</span><br>
<span class="quotelev1">&gt; qualified persons.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; == GNU compilers with {C,CXX,F77,FC}FLAGS=-mcpu=v9 on SPARCs, and -m64 
</span><br>
<span class="quotelev1">&gt; on amd64
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; PASS:
</span><br>
<span class="quotelev1">&gt;     solaris-10 s10_69/sun4u (w/ g77, no FC)
</span><br>
<span class="quotelev1">&gt;     solaris-10 Generic_142901-03/i386 (w/ Sun's f77 and f95, both 
</span><br>
<span class="quotelev1">&gt; dated April 2009)
</span><br>
<span class="quotelev1">&gt;     solaris-11 snv_151a/amd64 [including ofud, openib and dapl] (w/ 
</span><br>
<span class="quotelev1">&gt; g77, no FC)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; FAIL:
</span><br>
<span class="quotelev1">&gt;     solaris-10 Generic_137111-07/sun4v with default GNU compilers
</span><br>
<span class="quotelev1">&gt; Using system default gcc, which is actually Sun's gccfss-4.0.4, there 
</span><br>
<span class="quotelev1">&gt; are assertion failures seen in the atomics in &quot;make check&quot;.  I can 
</span><br>
<span class="quotelev1">&gt; provide details is anybody cares, but I know from past experience that 
</span><br>
<span class="quotelev1">&gt; support for gcc-style inline asm is marginal in this compiler.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; == Sun Studio 12.2 compilers w/ {C,CXX,F77,FC}=-m64 on SPARCs and amd64
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Both of my SPARC systems appear to have an out-of-date libmtsk.so, 
</span><br>
<span class="quotelev1">&gt; which both prevents the Sun f77 and f90 compilers from running at all, 
</span><br>
<span class="quotelev1">&gt; and additionally leads to failure like the following when building 
</span><br>
<span class="quotelev1">&gt; OpenMP support in VT:
</span><br>
<span class="quotelev2">&gt;&gt; /bin/bash ../../libtool --tag=CXX    --mode=link sunCC -xopenmp 
</span><br>
<span class="quotelev2">&gt;&gt; -DVT_OMP  -m64 -xopenmp  -o vtfilter vtfilter-vt_filter.o  
</span><br>
<span class="quotelev2">&gt;&gt; vtfilter-vt_filthandler.o  vtfilter-vt_otfhandler.o  
</span><br>
<span class="quotelev2">&gt;&gt; vtfilter-vt_tracefilter.o ../../util/util.o  
</span><br>
<span class="quotelev2">&gt;&gt; -L../../extlib/otf/otflib -L../../extlib/otf/otflib/.libs -lotf  -lz 
</span><br>
<span class="quotelev2">&gt;&gt; -lsocket -lnsl  -lrt -lm -lthread
</span><br>
<span class="quotelev2">&gt;&gt; libtool: link: sunCC -xopenmp -DVT_OMP -m64 -xopenmp -o vtfilter 
</span><br>
<span class="quotelev2">&gt;&gt; vtfilter-vt_filter.o vtfilter-vt_filthandler.o 
</span><br>
<span class="quotelev2">&gt;&gt; vtfilter-vt_otfhandler.o vtfilter-vt_tracefilter.o ../../util/util.o  
</span><br>
<span class="quotelev2">&gt;&gt; -L/home/hargrove/OMPI/openmpi-1.4.5rc2-solaris10-sparcT2-ss12u2/BLD/ompi/contrib/vt/vt/extlib/otf/otflib/.libs 
</span><br>
<span class="quotelev2">&gt;&gt; -L/home/hargrove/OMPI/openmpi-1.4.5rc2-solaris10-sparcT2-ss12u2/BLD/ompi/contrib/vt/vt/extlib/otf/otflib 
</span><br>
<span class="quotelev2">&gt;&gt; /home/hargrove/OMPI/openmpi-1.4.5rc2-solaris10-sparcT2-ss12u2/BLD/ompi/contrib/vt/vt/extlib/otf/otflib/.libs/libotf.a 
</span><br>
<span class="quotelev2">&gt;&gt; -lz -lsocket -lnsl -lrt -lm -lthread
</span><br>
<span class="quotelev2">&gt;&gt; CC: Warning: Optimizer level changed from 0 to 3 to support 
</span><br>
<span class="quotelev2">&gt;&gt; parallelized code.
</span><br>
<span class="quotelev2">&gt;&gt; Undefined                       first referenced
</span><br>
<span class="quotelev2">&gt;&gt;  symbol                             in file
</span><br>
<span class="quotelev2">&gt;&gt; __mt_MasterFunction_cxt_            vtfilter-vt_tracefilter.o
</span><br>
<span class="quotelev2">&gt;&gt; ld: fatal: Symbol referencing errors. No output written to vtfilter
</span><br>
<span class="quotelev2">&gt;&gt; *** Error code 2
</span><br>
<span class="quotelev1">&gt; This is a lack of required Solaris patches and NOT an ompi or vt 
</span><br>
<span class="quotelev1">&gt; problem to be solved.
</span><br>
<span class="quotelev1">&gt; However, as a result my two SPARC platforms are configured with
</span><br>
<span class="quotelev1">&gt;    --disable-mpi-f77 --disable-mpi-f90 
</span><br>
<span class="quotelev1">&gt; --with-contrib-vt-flags=&quot;--disable-omp --disable-hyb&quot;
</span><br>
<span class="quotelev1">&gt; [It took a bit of work to figure out how disable OMP and not just VT 
</span><br>
<span class="quotelev1">&gt; in its entirety.]
</span><br>
<span class="quotelev1">&gt; I report this info just to note that my SPARC testing is &quot;narrower&quot; 
</span><br>
<span class="quotelev1">&gt; than on my x86 and amd64 machines.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The one &quot;real&quot; problem I found appears to be libtool related and 
</span><br>
<span class="quotelev1">&gt; impacted all 4 platforms:
</span><br>
<span class="quotelev1">&gt;     solaris-10 s10_69/sun4u
</span><br>
<span class="quotelev1">&gt;     solaris-10 Generic_142901-03/i386
</span><br>
<span class="quotelev1">&gt;     solaris-11 snv_151a/amd64 [including ofud, openib and dapl]
</span><br>
<span class="quotelev1">&gt;     solaris-10 Generic_137111-07/sun4v
</span><br>
<span class="quotelev1">&gt; No problem with &quot;make all&quot; or with &quot;make check&quot;, but &quot;make install&quot; 
</span><br>
<span class="quotelev1">&gt; fails with:
</span><br>
<span class="quotelev2">&gt;&gt; Making install in mpi/cxx
</span><br>
<span class="quotelev2">&gt;&gt; make[2]: Entering directory 
</span><br>
<span class="quotelev2">&gt;&gt; `/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/BLD/ompi/mpi/cxx'
</span><br>
<span class="quotelev2">&gt;&gt; make[3]: Entering directory 
</span><br>
<span class="quotelev2">&gt;&gt; `/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/BLD/ompi/mpi/cxx'
</span><br>
<span class="quotelev2">&gt;&gt; test -z 
</span><br>
<span class="quotelev2">&gt;&gt; &quot;/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/INST/lib&quot; || 
</span><br>
<span class="quotelev2">&gt;&gt; /usr/gnu/bin/mkdir -p 
</span><br>
<span class="quotelev2">&gt;&gt; &quot;/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/INST/lib&quot;
</span><br>
<span class="quotelev2">&gt;&gt;  /bin/sh ../../../libtool   --mode=install /usr/bin/ginstall -c  
</span><br>
<span class="quotelev2">&gt;&gt; 'libmpi_cxx.la' 
</span><br>
<span class="quotelev2">&gt;&gt; '/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/INST/lib/libmpi_cxx.la'
</span><br>
<span class="quotelev2">&gt;&gt; libtool: install: warning: relinking `libmpi_cxx.la'
</span><br>
<span class="quotelev2">&gt;&gt; libtool: install: (cd 
</span><br>
<span class="quotelev2">&gt;&gt; /home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/BLD/ompi/mpi/cxx; 
</span><br>
<span class="quotelev2">&gt;&gt; /bin/sh 
</span><br>
<span class="quotelev2">&gt;&gt; /home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/BLD/libtool  
</span><br>
<span class="quotelev2">&gt;&gt; --tag CXX --mode=relink sunCC -O -DNDEBUG -m64 -version-info 0:1:0 
</span><br>
<span class="quotelev2">&gt;&gt; -export-dynamic -o libmpi_cxx.la -rpath 
</span><br>
<span class="quotelev2">&gt;&gt; /home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/INST/lib 
</span><br>
<span class="quotelev2">&gt;&gt; mpicxx.lo intercepts.lo comm.lo datatype.lo win.lo file.lo 
</span><br>
<span class="quotelev2">&gt;&gt; ../../../ompi/libmpi.la -lsocket -lnsl -lm -lthread )
</span><br>
<span class="quotelev2">&gt;&gt; mv: cannot stat `libmpi_cxx.so.0.0.1': No such file or directory
</span><br>
<span class="quotelev2">&gt;&gt; libtool: install: error: relink `libmpi_cxx.la' with the above 
</span><br>
<span class="quotelev2">&gt;&gt; command before installing it
</span><br>
<span class="quotelev2">&gt;&gt; make[3]: *** [install-libLTLIBRARIES] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; make[3]: Leaving directory 
</span><br>
<span class="quotelev2">&gt;&gt; `/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/BLD/ompi/mpi/cxx'
</span><br>
<span class="quotelev2">&gt;&gt; make[2]: *** [install-am] Error 2
</span><br>
<span class="quotelev2">&gt;&gt; make[2]: Leaving directory 
</span><br>
<span class="quotelev2">&gt;&gt; `/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/BLD/ompi/mpi/cxx'
</span><br>
<span class="quotelev2">&gt;&gt; make[1]: *** [install-recursive] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; make[1]: Leaving directory 
</span><br>
<span class="quotelev2">&gt;&gt; `/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-suncc/BLD/ompi'
</span><br>
<span class="quotelev2">&gt;&gt; make: *** [install-recursive] Error 1
</span><br>
<span class="quotelev1">&gt; No such problem was seen w/ the GNU compilers on the same 4 systems.
</span><br>
<span class="quotelev1">&gt; This looks to be a libtool bug in support for the Sun C++ compiler, 
</span><br>
<span class="quotelev1">&gt; especially since configuring with &quot;--enable-static --disable-shared&quot; 
</span><br>
<span class="quotelev1">&gt; eliminates this problem (but is undesirable for obvious reasons).
</span><br>
<span class="quotelev1">&gt; A quick peek appears to show some dangling symlinks:
</span><br>
<span class="quotelev2">&gt;&gt; $ ls -l ompi/mpi/cxx/.libs/
</span><br>
<span class="quotelev2">&gt;&gt; total 869
</span><br>
<span class="quotelev2">&gt;&gt; -rw-r--r-- 1 phargrov staff 116944 2012-01-19 18:09 comm.o
</span><br>
<span class="quotelev2">&gt;&gt; -rw-r--r-- 1 phargrov staff  41644 2012-01-19 18:09 datatype.o
</span><br>
<span class="quotelev2">&gt;&gt; -rw-r--r-- 1 phargrov staff  17240 2012-01-19 18:09 file.o
</span><br>
<span class="quotelev2">&gt;&gt; -rw-r--r-- 1 phargrov staff 222592 2012-01-19 18:09 intercepts.o
</span><br>
<span class="quotelev2">&gt;&gt; lrwxrwxrwx 1 phargrov staff     16 2012-01-19 18:09 libmpi_cxx.la -&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; ../libmpi_cxx.la
</span><br>
<span class="quotelev2">&gt;&gt; -rw-r--r-- 1 phargrov staff   1262 2012-01-19 18:09 libmpi_cxx.lai
</span><br>
<span class="quotelev2">&gt;&gt; lrwxrwxrwx 1 phargrov staff     19 2012-01-19 18:09 libmpi_cxx.so -&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; libmpi_cxx.so.0.0.1
</span><br>
<span class="quotelev2">&gt;&gt; lrwxrwxrwx 1 phargrov staff     19 2012-01-19 18:09 libmpi_cxx.so.0 
</span><br>
<span class="quotelev2">&gt;&gt; -&gt; libmpi_cxx.so.0.0.1
</span><br>
<span class="quotelev2">&gt;&gt; -rw-r--r-- 1 phargrov staff 267364 2012-01-19 18:09 mpicxx.o
</span><br>
<span class="quotelev2">&gt;&gt; -rw-r--r-- 1 phargrov staff  46660 2012-01-19 18:09 win.o
</span><br>
<span class="quotelev1">&gt; It is possible that the library build failed in &quot;make all&quot; w/o 
</span><br>
<span class="quotelev1">&gt; terminating the build (I've seen such things before).
</span><br>
<span class="quotelev1">&gt; The initial evidence in the &quot;make all&quot; output does suggest no shared 
</span><br>
<span class="quotelev1">&gt; lib was built:
</span><br>
<span class="quotelev2">&gt;&gt; /bin/sh ../../../libtool --tag=CXX   --mode=link sunCC  -O -DNDEBUG 
</span><br>
<span class="quotelev2">&gt;&gt; -m64  -version-info 0:1:0 -export-dynamic   -o libmpi_cxx.la -rpath 
</span><br>
<span class="quotelev2">&gt;&gt; /home/phargrov/OMPI/openmpi-1.4.5rc2-solaris11-x64-ib-ss12u2/INST/lib 
</span><br>
<span class="quotelev2">&gt;&gt; mpicxx.lo intercepts.lo comm.lo datatype.lo win.lo file.lo 
</span><br>
<span class="quotelev2">&gt;&gt; ../../../ompi/libmpi.la -lsocket -lnsl  -lm -lthread
</span><br>
<span class="quotelev2">&gt;&gt; libtool: link: (cd &quot;.libs&quot; &amp;&amp; rm -f &quot;libmpi_cxx.so.0&quot; &amp;&amp; ln -s 
</span><br>
<span class="quotelev2">&gt;&gt; &quot;libmpi_cxx.so.0.0.1&quot; &quot;libmpi_cxx.so.0&quot;)
</span><br>
<span class="quotelev2">&gt;&gt; libtool: link: (cd &quot;.libs&quot; &amp;&amp; rm -f &quot;libmpi_cxx.so&quot; &amp;&amp; ln -s 
</span><br>
<span class="quotelev2">&gt;&gt; &quot;libmpi_cxx.so.0.0.1&quot; &quot;libmpi_cxx.so&quot;)
</span><br>
<span class="quotelev2">&gt;&gt; libtool: link: ( cd &quot;.libs&quot; &amp;&amp; rm -f &quot;libmpi_cxx.la&quot; &amp;&amp; ln -s 
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../libmpi_cxx.la&quot; &quot;libmpi_cxx.la&quot; )
</span><br>
<span class="quotelev1">&gt; Note the lack of any suncc or sunCC command beween the libtool command 
</span><br>
<span class="quotelev1">&gt; line and the &quot;rm &amp;&amp; ln&quot; commands.
</span><br>
<span class="quotelev1">&gt; Inspecting the configure-generated libtool confirms what looks like 
</span><br>
<span class="quotelev1">&gt; improper config for tag=CXX:
</span><br>
<span class="quotelev2">&gt;&gt; $ grep -e &quot;BEGIN LIBTOOL TAG CONFIG: [FC]&quot; -e ^archive_cmds libtool
</span><br>
<span class="quotelev2">&gt;&gt; archive_cmds=&quot;\$CC -G\${allow_undefined_flag} -h \$soname -o \$lib 
</span><br>
<span class="quotelev2">&gt;&gt; \$libobjs \$deplibs \$compiler_flags&quot;
</span><br>
<span class="quotelev2">&gt;&gt; # ### BEGIN LIBTOOL TAG CONFIG: CXX
</span><br>
<span class="quotelev2">&gt;&gt; archive_cmds=&quot;&quot;
</span><br>
<span class="quotelev2">&gt;&gt; # ### BEGIN LIBTOOL TAG CONFIG: F77
</span><br>
<span class="quotelev2">&gt;&gt; archive_cmds=&quot;\$CC -G\${allow_undefined_flag} -h \$soname -o \$lib 
</span><br>
<span class="quotelev2">&gt;&gt; \$libobjs \$deplibs \$compiler_flags&quot;
</span><br>
<span class="quotelev2">&gt;&gt; # ### BEGIN LIBTOOL TAG CONFIG: FC
</span><br>
<span class="quotelev2">&gt;&gt; archive_cmds=&quot;\$CC -G\${allow_undefined_flag} -h \$soname -o \$lib 
</span><br>
<span class="quotelev2">&gt;&gt; \$libobjs \$deplibs \$compiler_flags&quot;
</span><br>
<span class="quotelev1">&gt; I'll be happy to provide all or part of config.log to Ralf W. or other 
</span><br>
<span class="quotelev1">&gt; interested persons to debug this.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I suppose I could have tried w/o C++ bindings instead of disabling 
</span><br>
<span class="quotelev1">&gt; libtool, but with F77 and F90 bindings already disabled on the SPARCs 
</span><br>
<span class="quotelev1">&gt; that didn't feel to me like a very good use of my time.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; An additional annoyance on one platform:
</span><br>
<span class="quotelev1">&gt;     solaris-10 Generic_142901-03/i386
</span><br>
<span class="quotelev1">&gt; Is additionally unhappy with the atomics, yielding the following 
</span><br>
<span class="quotelev1">&gt; warnings for every file that include atomic.h:
</span><br>
<span class="quotelev2">&gt;&gt; &quot;/export/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris10-x86-ss12u2//openmpi-1.4.5rc2/opal/include/opal/sys/ia32/atomic.h&quot;, 
</span><br>
<span class="quotelev2">&gt;&gt; line 170: warning: impossible constraint for &quot;%1&quot; asm operand
</span><br>
<span class="quotelev2">&gt;&gt; &quot;/export/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris10-x86-ss12u2//openmpi-1.4.5rc2/opal/include/opal/sys/ia32/atomic.h&quot;, 
</span><br>
<span class="quotelev2">&gt;&gt; line 170: warning: parameter in inline asm statement unused: %2
</span><br>
<span class="quotelev2">&gt;&gt; &quot;/export/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris10-x86-ss12u2//openmpi-1.4.5rc2/opal/include/opal/sys/ia32/atomic.h&quot;, 
</span><br>
<span class="quotelev2">&gt;&gt; line 187: warning: impossible constraint for &quot;%1&quot; asm operand
</span><br>
<span class="quotelev2">&gt;&gt; &quot;/export/home/phargrov/OMPI/openmpi-1.4.5rc2-solaris10-x86-ss12u2//openmpi-1.4.5rc2/opal/include/opal/sys/ia32/atomic.h&quot;, 
</span><br>
<span class="quotelev2">&gt;&gt; line 187: warning: parameter in inline asm statement unused: %2
</span><br>
<span class="quotelev1">&gt; This is annoying, but &quot;make check&quot; passes all tests.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Future Technologies Group
HPC Research Department                   Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10254.php">TERRY DONTJE: "Re: [OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]"</a>
<li><strong>Previous message:</strong> <a href="10252.php">George Bosilca: "Re: [OMPI devel] [PATCH] MPI_FILE_SEEK_SHARED is wrong in Fortran"</a>
<li><strong>In reply to:</strong> <a href="10234.php">Paul H. Hargrove: "[OMPI devel] 1.4.5rc2 Solaris results [libtool problem]"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10254.php">TERRY DONTJE: "Re: [OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]"</a>
<li><strong>Reply:</strong> <a href="10254.php">TERRY DONTJE: "Re: [OMPI devel] SOLVED: 1.4.5rc2 Solaris results [libtool problem]"</a>
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
