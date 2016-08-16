/**
 * Created by apollomm on 7/28/16.
 */
app.controller('FileUploadController',
    [
        '$scope'
        , 'FileUploader'
        , 'file'
        , '$window'
        ,  function($scope, FileUploader, file, $window) {

    var uploader = $scope.uploader = new FileUploader({

        url:'http://backdoor.local/api/v1/file/post'
    });

    file.get(function (response) {
        $scope.result = response.content;
    },
        function (error) {

        console.log (error);
    });

    // FILTERS

    uploader.filters.push({
        name: 'customFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            return this.queue.length < 10;
        }
    });

    // CALLBACKS

    //uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
    //    console.info('onWhenAddingFileFailed', item, filter, options);
    //};
    //uploader.onAfterAddingFile = function(fileItem) {
    //    console.info('onAfterAddingFile', fileItem);
    //};
    //uploader.onAfterAddingAll = function(addedFileItems) {
    //    console.info('onAfterAddingAll', addedFileItems);
    //};
    //uploader.onBeforeUploadItem = function(item) {
    //    console.info('onBeforeUploadItem', item);
    //};
    //uploader.onProgressItem = function(fileItem, progress) {
    //    console.info('onProgressItem', fileItem, progress);
    //};
    //uploader.onProgressAll = function(progress) {
    //    console.info('onProgressAll', progress);
    //};
    //uploader.onSuccessItem = function(fileItem, response, status, headers) {
    //    console.info('onSuccessItem', fileItem, response, status, headers);
    //};
    //uploader.onErrorItem = function(fileItem, response, status, headers) {
    //    console.info('onErrorItem', fileItem, response, status, headers);
    //};
    //uploader.onCancelItem = function(fileItem, response, status, headers) {
    //    console.info('onCancelItem', fileItem, response, status, headers);
    //};
    //uploader.onCompleteItem = function(fileItem, response, status, headers) {
    //    console.info('onCompleteItem', fileItem, response, status, headers);
    //};
    uploader.onCompleteAll = function() {
        console.info('onCompleteAll');
        $window.reload();
    };
    //
    //console.info('uploader', uploader);

}]);