<?
$subject_val = "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jun  7 12:38:44 2013" -->
<!-- isoreceived="20130607163844" -->
<!-- sent="Fri, 7 Jun 2013 16:38:23 +0000" -->
<!-- isosent="20130607163823" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t" -->
<!-- id="EF66BBEB19BADC41AC8CCF5F684F07FC4F66D0FB_at_xmb-rcd-x01.cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="9242BE5F-E631-4759-9C99-5E9721ACF9CD_at_icl.utk.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-06-07 12:38:23
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="12438.php">Thomas Naughton: "[OMPI devel] 'install-sh' in SVN"</a>
<li><strong>Previous message:</strong> <a href="12436.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
<li><strong>In reply to:</strong> <a href="12436.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="12440.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
<li><strong>Reply:</strong> <a href="12440.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Perhaps I was wrong -- I thought we had no static initializer because there was no static initializer for mutexes in windows.  
<br>
<p><p>On Jun 7, 2013, at 9:28 AM, George Bosilca &lt;bosilca_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Im curious to know why Windows support is to be blamed for the lack of such functionality?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;  George.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Jun 7, 2013, at 18:08 , Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Nathan forgot to mention that we didn't have this before because of Windows.  But now we don't have Windows support, so...
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Jun 7, 2013, at 9:01 AM, &quot;Hjelm, Nathan T&quot; &lt;hjelmn_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; What: Add a static initializer for opal_mutex_t for both posix and solaris threads.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Why: Enables the use of opal locks that don't have to be OBJ_CONSTRUCT'ed.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; When: This is a trivial addition but I would like some review/testing of the code (I don't have solaris). Setting timeout to Tuesday, June 11, 2013
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; diff --git a/opal/threads/mutex_unix.h b/opal/threads/mutex_unix.h
</span><br>
<span class="quotelev3">&gt;&gt;&gt; index 27528e6..28b1744 100644
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --- a/opal/threads/mutex_unix.h
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +++ b/opal/threads/mutex_unix.h
</span><br>
<span class="quotelev3">&gt;&gt;&gt; @@ -81,6 +81,25 @@ OPAL_DECLSPEC OBJ_CLASS_DECLARATION(opal_mutex_t);
</span><br>
<span class="quotelev3">&gt;&gt;&gt; * POSIX threads
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ************************************************************************/
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#if !OPAL_ENABLE_MULTI_THREADS &amp;&amp; OPAL_ENABLE_DEBUG
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#define OPAL_MUTEX_STATIC_INIT                      \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  {                                                 \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .super = OPAL_OBJ_STATIC_INIT(opal_object_t), \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_pthread = PTHREAD_MUTEX_INITIALIZER,  \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_debug = 0,                            \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_file = NULL,                          \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_line = 0,                             \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_atomic = 0                            \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  }
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#else
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#define OPAL_MUTEX_STATIC_INIT                      \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  {                                                 \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .super = OPAL_OBJ_STATIC_INIT(opal_object_t), \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_pthread = PTHREAD_MUTEX_INITIALIZER,  \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_atomic = 0                            \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  }
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#endif
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; static inline int opal_mutex_trylock(opal_mutex_t *m)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; {
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #if OPAL_ENABLE_DEBUG
</span><br>
<span class="quotelev3">&gt;&gt;&gt; @@ -130,6 +149,25 @@ static inline void opal_mutex_unlock(opal_mutex_t *m)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; * Solaris threads
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ************************************************************************/
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#if !OPAL_ENABLE_MULTI_THREADS &amp;&amp; OPAL_ENABLE_DEBUG
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#define OPAL_MUTEX_STATIC_INIT                      \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  {                                                 \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .super = OPAL_OBJ_STATIC_INIT(opal_object_t), \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_solaris = DEFAULTMUTEX,               \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_debug = 0,                            \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_file = NULL,                          \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_line = 0,                             \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_atomic = 0                            \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  }
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#else
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#define OPAL_MUTEX_STATIC_INIT                      \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  {                                                 \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .super = OPAL_OBJ_STATIC_INIT(opal_object_t), \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_solaris = DEFAULTMUTEX,               \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +      .m_lock_atomic = 0                            \
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +  }
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +#endif
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; static inline int opal_mutex_trylock(opal_mutex_t *m)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; {
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
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev2">&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
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
<li><strong>Next message:</strong> <a href="12438.php">Thomas Naughton: "[OMPI devel] 'install-sh' in SVN"</a>
<li><strong>Previous message:</strong> <a href="12436.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
<li><strong>In reply to:</strong> <a href="12436.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="12440.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
<li><strong>Reply:</strong> <a href="12440.php">George Bosilca: "Re: [OMPI devel] RFC: Add static initializer for opal_mutex_t"</a>
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
