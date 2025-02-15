<?
$subject_val = "[OMPI users] Allgather Implementation Details";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Jun 30 10:50:53 2015" -->
<!-- isoreceived="20150630145053" -->
<!-- sent="Tue, 30 Jun 2015 10:50:52 -0400" -->
<!-- isosent="20150630145052" -->
<!-- name="Saliya Ekanayake" -->
<!-- email="esaliya_at_[hidden]" -->
<!-- subject="[OMPI users] Allgather Implementation Details" -->
<!-- id="CA+ssbKVipTJyavCJ0gyP8hLf+X4wfy7o3e3gYQu-86TjOOLEig_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
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
<strong>Subject:</strong> [OMPI users] Allgather Implementation Details<br>
<strong>From:</strong> Saliya Ekanayake (<em>esaliya_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-06-30 10:50:52
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="27230.php">Nick Radcliffe: "Re: [OMPI users] Running with native ugni on a Cray XC"</a>
<li><strong>Previous message:</strong> <a href="27228.php">Marc-Andre Hermanns: "Re: [OMPI users] Progress on target of MPI_Win_lock on Infiniband"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="27232.php">George Bosilca: "Re: [OMPI users] Allgather Implementation Details"</a>
<li><strong>Reply:</strong> <a href="27232.php">George Bosilca: "Re: [OMPI users] Allgather Implementation Details"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi,
<br>
<p>I am experiencing some bottleneck with allgatherv routine in one of our
<br>
programs and wonder how it works internally. Could you please share some
<br>
details on this?
<br>
<p>I found this [1] paper from Gropp discussing an efficient implementation.
<br>
Is this similar to what we get in OpenMPI?
<br>
<p><p><p>[1]
<br>
<a href="http://www.researchgate.net/profile/William_Gropp/publication/221597354_A_Simple_Pipelined_Algorithm_for_Large_Irregular_All-gather_Problems/links/00b49525d291830c67000000.pdf">http://www.researchgate.net/profile/William_Gropp/publication/221597354_A_Simple_Pipelined_Algorithm_for_Large_Irregular_All-gather_Problems/links/00b49525d291830c67000000.pdf</a>
<br>
<p><p><p>Thank you,
<br>
Saliya
<br>
<pre>
-- 
Saliya Ekanayake
Ph.D. Candidate | Research Assistant
School of Informatics and Computing | Digital Science Center
Indiana University, Bloomington
Cell 812-391-4914
<a href="http://saliya.org">http://saliya.org</a>
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-27229/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="27230.php">Nick Radcliffe: "Re: [OMPI users] Running with native ugni on a Cray XC"</a>
<li><strong>Previous message:</strong> <a href="27228.php">Marc-Andre Hermanns: "Re: [OMPI users] Progress on target of MPI_Win_lock on Infiniband"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="27232.php">George Bosilca: "Re: [OMPI users] Allgather Implementation Details"</a>
<li><strong>Reply:</strong> <a href="27232.php">George Bosilca: "Re: [OMPI users] Allgather Implementation Details"</a>
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
