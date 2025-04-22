<?php

namespace Util;

abstract class GenericConstantsUtil
{
    /* REQUESTS */
    public const REQUEST_TYPE = ['GET', 'POST', 'DELETE', 'PUT'];
    public const GET_TYPE = ['users'];
    public const POST_TYPE = ['users', 'login'];
    public const DELETE_TYPE = ['users'];
    public const PUT_TYPE = ['users'];

    /* ERRORS */
    public const ERROR_MSG_ROUTE_TYPE = 'Invalid route!';
    public const ERROR_MSG_RESOURCE_NOT_FOUND = 'Resource not found!';
    public const ERROR_MSG_GENERIC = 'An error occurred in the request!';
    public const ERROR_MSG_NO_RESULT = 'No records found!';
    public const ERROR_MSG_NOT_AFFECTED = 'No records affected!';
    public const ERROR_MSG_EMPTY_TOKEN = 'Token is required!';
    public const ERROR_MSG_UNAUTHORIZED_TOKEN = 'Unauthorized token!';
    public const ERROR_MSG_EMPTY_JSON = 'Request body cannot be empty!';

    /* SUCCESS */
    public const SUCCESS_MSG_DELETED = 'Record deleted successfully!';
    public const SUCCESS_MSG_UPDATED = 'Record updated successfully!';

    /* USERS RESOURCE */
    public const ERROR_MSG_REQUIRED_ID = 'ID is required!';
    public const ERROR_MSG_EXISTING_LOGIN = 'Login already exists!';
    public const ERROR_MSG_REQUIRED_LOGIN_PASSWORD = 'Login and password are required!';

    /* JSON RESPONSE */
    const SUCCESS_TYPE = 'success';
    const ERROR_TYPE = 'error';

    /* OTHERS */
    public const YES = 'Y';
    public const TYPE = 'type';
    public const RESPONSE = 'response';
}
