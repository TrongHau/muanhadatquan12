<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
        </div>

    </div>
</div>
@yield('footerElement')
<footer>
    <div class="container clearfix">
        <div class="box-footer3">
            <p><strong>Tel</strong>: <strong>{{ENV('PHONE_CONTACT')}}</strong><br />
        </div>
    </div>

    <div class="copyright">
        <p class="container">Copyright &copy; 2012. All Rights Reserved.</p>
    </div>
</footer>
<script type="text/javascript" src="/js/jquery.yiilistview.js"></script>
@yield('contentJS')
<script src="/js/functions.js"></script>
