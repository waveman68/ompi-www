<?
$subject_val = "Re: [OMPI devel] Compile-time MPI_Datatype checking";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Oct 31 15:36:14 2012" -->
<!-- isoreceived="20121031193614" -->
<!-- sent="Wed, 31 Oct 2012 12:36:08 -0700" -->
<!-- isosent="20121031193608" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Compile-time MPI_Datatype checking" -->
<!-- id="CAAvDA173czzj7-CHG21NJHQ_wO5wVRy-JvV9a1nUYv-3=SdO3w_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="25B2A0ED-D93B-44FA-8B9F-772B5FC4EEB7_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Compile-time MPI_Datatype checking<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-10-31 15:36:08
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11715.php">Paul Kapinos: "[OMPI devel] Multirail + Open MPI 1.6.1 = very big latency for the first communication"</a>
<li><strong>Previous message:</strong> <a href="11713.php">Dmitri Gribenko: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
<li><strong>In reply to:</strong> <a href="11712.php">Ralph Castain: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11717.php">Ralph Castain: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
<li><strong>Reply:</strong> <a href="11717.php">Ralph Castain: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Ralph,
<br>
<p>I don't think I missed the point about the origin of the concern - we just
<br>
have different view points.
<br>
<p>Jeff indicated that he previously thought the &quot;odd&quot; practice shown in the
<br>
example was uncommon until he learned is was common in codes at Sandia.
<br>
&nbsp;Perhaps you and I have interpreted the &quot;impact&quot; differently:
<br>
+ From your responses I gather you are concerned only (or primarily) w/
<br>
folks at Sandia who work on codes that have the &quot;odd&quot; behavior.
<br>
+ On the other hand, I took the Sandia codes as an &quot;existence proof&quot;
<br>
showing that &quot;really smart people&quot; can still write questionable code at
<br>
times.  So, I think there could be a non-trivial number of codes developed
<br>
outside of Sandia that would start generating warnings (possibly MANY of
<br>
them).
<br>
<p><p>-Paul
<br>
<p>On Wed, Oct 31, 2012 at 12:16 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Understood - I also do my development on a Mac. You missed my point
</span><br>
<span class="quotelev1">&gt; entirely - the concern was raised by a member from Sandia based on not
</span><br>
<span class="quotelev1">&gt; generating warnings for their users. Those users are NOT on a Mac - they
</span><br>
<span class="quotelev1">&gt; are building on the head node of the HPC cluster.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; If we want to raise the issue of what is best for developers, then I tend
</span><br>
<span class="quotelev1">&gt; to err on the side of generating warnings. However, those warnings must not
</span><br>
<span class="quotelev1">&gt; appear for users when the code is in fact valid.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The fact that some compilers do that is irrelevant - we are talking about
</span><br>
<span class="quotelev1">&gt; what we want OMPI to do.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Oct 31, 2012, at 12:11 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Ralph,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I work at a National Lab, and like many of my peers I develop/prototype
</span><br>
<span class="quotelev1">&gt; codes on my desktop and/or laptop.  So, I think the default behavior of
</span><br>
<span class="quotelev1">&gt; mpicc on a Clang-based Mac is entirely relevant.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; FWIW:
</span><br>
<span class="quotelev1">&gt; I agree w/ Jeff that these datatype checking warnings &quot;feel&quot; like
</span><br>
<span class="quotelev1">&gt; a candidate for &quot;-Wall&quot; (or &quot;-Wextra&quot;), rather than enabled by default.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Wed, Oct 31, 2012 at 12:04 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Understood, but also remember that the national labs don't have Mac
</span><br>
<span class="quotelev2">&gt;&gt; clusters - and so they couldn't care less about Clang. The concerns over
</span><br>
<span class="quotelev2">&gt;&gt; these changes were from the national labs, so my point was that this
</span><br>
<span class="quotelev2">&gt;&gt; discussion may all be irrelevant.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Oct 31, 2012, at 11:47 AM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Note that with Apple's latest versions of Xcode (4.2 and higher, IIRC)
</span><br>
<span class="quotelev2">&gt;&gt; Clang is now the default C compiler.  I am told that Clang is the ONLY
</span><br>
<span class="quotelev2">&gt;&gt; bundled compiler for OSX 10.8 (Mountain Lion) unless you take extra steps
</span><br>
<span class="quotelev2">&gt;&gt; to install gcc (which is actually llvm-gcc and cross-compiles for OSX 10.7).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; So, Clang *is* gaining some &quot;market share&quot;, though not yet in major HPC
</span><br>
<span class="quotelev2">&gt;&gt; systems.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; -Paul
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Wed, Oct 31, 2012 at 11:40 AM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; If it's only on for Clang, I very much doubt anyone will care - I'm
</span><br>
<span class="quotelev3">&gt;&gt;&gt; unaware of any of our users that currently utilize that compiler, and
</span><br>
<span class="quotelev3">&gt;&gt;&gt; certainly not on the clusters in the national labs (gcc, Intel, etc. - but
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I've never seen them use Clang).
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Not saying anything negative about Clang - just noting it isn't much
</span><br>
<span class="quotelev3">&gt;&gt;&gt; used in our current community that I've heard.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Oct 31, 2012, at 11:19 AM, Dmitri Gribenko &lt;gribozavr_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; On Wed, Oct 31, 2012 at 5:04 PM, Jeff Squyres &lt;jsquyres_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; On Oct 31, 2012, at 9:38 AM, Dmitri Gribenko wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; &gt;&gt;&gt;&gt; The rationale here is that correct MPI applications should not need
</span><br>
<span class="quotelev3">&gt;&gt;&gt; to add any extra compiler files to compile without warnings.
</span><br>
<span class="quotelev2">&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt; &gt;&gt;&gt; I would disagree with this.  Compiler warnings are most useful when
</span><br>
<span class="quotelev2">&gt;&gt;&gt; &gt;&gt;&gt; they are on by default.  Only a few developers will turn on a warning
</span><br>
<span class="quotelev2">&gt;&gt;&gt; &gt;&gt;&gt; because warnings are hard to discover and enabling a warning requires
</span><br>
<span class="quotelev2">&gt;&gt;&gt; &gt;&gt;&gt; an explicit action from the developer.
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; Understood, but:
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; a) MPI explicitly allows this kind of deliberate mismatch.  It does
</span><br>
<span class="quotelev3">&gt;&gt;&gt; not make sense to warn for things that are correct in MPI.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; I don't think it is MPI.  It is the C standard that allows one to
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; store any pointer in void* and char*.  But C standard also considers
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; lots of other weird things to be valid, see below.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; b) Warnings are significantly less useful if the user looks at them
</span><br>
<span class="quotelev3">&gt;&gt;&gt; and says, &quot;the compiler is wrong; I know that MPI says that this deliberate
</span><br>
<span class="quotelev3">&gt;&gt;&gt; mismatch in my code is ok.&quot;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; Well, one can also argue that since the following is valid C, the
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; warning in question should not be implemented at all:
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; long *b = malloc(sizeof(int));
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; MPI_Recv(b, 1, MPI_INT, ...);
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; But this code is clearly badly written, so we are left with a question
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; about where to draw the line.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; c) as such, these warnings are really only useful for the application
</span><br>
<span class="quotelev3">&gt;&gt;&gt; where type/MPI_Datatype matching is expected/desired.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; Compilers already warn about valid C code.  Silencing many warnings
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; relies on conventions that are derived from best practices of being
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; explicit about something unusual.  For example:
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; $ cat /tmp/aaa.c
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; void foo(void *a) {
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;  for(int i = a; i &lt; 10; i++)
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;  {
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;    if(i = 5)
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;      return;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;  }
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; }
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; $ clang -fsyntax-only -std=c99 /tmp/aaa.c
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; /tmp/aaa.c:2:11: warning: incompatible pointer to integer conversion
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; initializing 'int' with an expression of type 'void *'
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; [-Wint-conversion]
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;  for(int i = a; i &lt; 10; i++)
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;          ^   ~
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; /tmp/aaa.c:4:10: warning: using the result of an assignment as a
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; condition without parentheses [-Wparentheses]
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;    if(i = 5)
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;       ~~^~~
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; /tmp/aaa.c:4:10: note: place parentheses around the assignment to
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; silence this warning
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;    if(i = 5)
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;         ^
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;       (    )
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; /tmp/aaa.c:4:10: note: use '==' to turn this assignment into an
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; equality comparison
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;    if(i = 5)
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;         ^
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;         ==
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; 2 warnings generated.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; According to C standard this is valid C code, but clang emits two
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; warnings on this.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; Can these warnings be enabled as part of the warnings rollup -Wall
</span><br>
<span class="quotelev3">&gt;&gt;&gt; option?  That would be an easy way to find/enable these warnings.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; IIRC, -Wall warning set is frozen in clang.  -Wall is misleading in
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; that it does not turn on all warnings implemented in the compiler.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; Clang has -Weverything to really turn on all warnings.  But
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; -Weverything is very noisy (by design, not to be fixed) unless one
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; also turns off all warnings that are not interesting for the project
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; with -Wno-foo.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; I don't think it is possible to disable this warning by default
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; because off-by-default warnings are discouraged in Clang.  There is no
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; formal policy, but the rule of thumb is: either make the warning good
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; enough for everyone or don't implement it; if some particular app does
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; something strange, it can disable this warning.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt; &gt;&gt;&gt; The pattern you described is an important one, but most MPI
</span><br>
<span class="quotelev2">&gt;&gt;&gt; &gt;&gt;&gt; applications will have matching buffer types/type tags.
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; I agree that most applications *probably* don't do this.  But
</span><br>
<span class="quotelev3">&gt;&gt;&gt; significant developer in this community (i.e., Sandia) has at least
</span><br>
<span class="quotelev3">&gt;&gt;&gt; multiple applications that *do* do it.  I can't ignore that.  :-(
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; Here are a few approaches to solving this in order of preference:
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; 0. Is this really a concern for Sandia?  (I.e., do they target Clang?)
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; 1. Ask the developer to silence the warning with a cast to 'void *' or
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; -Wno-type-safety.  Rationale: compilers already do warn about valid
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; but suspicious code.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; 2. Turn off checking for char* just like for void*.  Rationale: C
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; standard allows char* to alias a pointer of any type.  Note that char*
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; is special in this regard (strict aliasing rules).
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; 3. Turn off annotations by default in mpi.h.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; Dmitri
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; --
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; main(i,j){for(i=2;;i++){for(j=2;j&lt;i;j++){if(!(i%j)){j=0;break;}}if
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; (j){printf(&quot;%d\n&quot;,i);}}} /*Dmitri Gribenko &lt;gribozavr_at_[hidden]&gt;*/
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; --
</span><br>
<span class="quotelev2">&gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Future Technologies Group
</span><br>
<span class="quotelev2">&gt;&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev2">&gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Future Technologies Group
</span><br>
<span class="quotelev1">&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
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
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Future Technologies Group
Computer and Data Sciences Department     Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-11714/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11715.php">Paul Kapinos: "[OMPI devel] Multirail + Open MPI 1.6.1 = very big latency for the first communication"</a>
<li><strong>Previous message:</strong> <a href="11713.php">Dmitri Gribenko: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
<li><strong>In reply to:</strong> <a href="11712.php">Ralph Castain: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11717.php">Ralph Castain: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
<li><strong>Reply:</strong> <a href="11717.php">Ralph Castain: "Re: [OMPI devel] Compile-time MPI_Datatype checking"</a>
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
