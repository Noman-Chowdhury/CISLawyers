<?php


use Brian2694\Toastr\Facades\Toastr;

function datatableStatus($element)
{
    if ($element->status) {
        if ($element->status == 'active') {
            return '<label class="badge badge-success">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'approved') {
            return '<label class="badge badge-success">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'pending') {
            return '<label class="badge badge-warning">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'paused') {
            return '<label class="badge badge-secondary">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'expired') {
            return '<span class="text-danger font-weight-bolder">' . ucfirst($element->status) . '</span>';
        }
        if ($element->status == 'unapproved') {
            return '<label class="badge badge-danger">Unapproved</label>';
        }
        if ($element->status == 'inactive') {
            return '<label class="badge badge-secondary">Inactive</label>';
        }
        if ($element->status == 'cancelled') {
            return '<label class="badge badge-danger">Cancelled</label>';
        }
        if ($element->status == 'blocked') {
            return '<label class="badge badge-danger">Blocked</label>';
        }
        if ($element->status == 'declined') {
            return '<label class="badge badge-danger">Declined</label>';
        }
        if ($element->status == 'confirmed') {
            return '<label class="badge badge-success">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'processing') {
            return '<label class="badge badge-info">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'shipped') {
            return '<label class="badge badge-secondary">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'returned') {
            return '<label class="badge badge-dark">' . ucfirst($element->status) . '</label>';
        }
        if ($element->status == 'delivered') {
            return '<label class="badge badge-success">' . ucfirst($element->status) . '</label>';
        }

    } else {
        if ($element->description == 'Success') {
            return '<label class="badge badge-success">' . ucfirst($element->description) . '</label>';
        }
        if ($element->description == 'Failed') {
            return '<label class="badge badge-danger">' . ucfirst($element->description) . '</label>';
        }
    }

}

function bladeStatus($element)
{
    if ($element == 'active') {
        return 'badge badge-success';
    }
    if ($element == 'approved') {
        return 'badge badge-success';
    }
    if ($element == 'pending') {
        return 'badge badge-warning';
    }
    if ($element == 'paused') {
        return 'badge badge-secondary';
    }
    if ($element == 'expired') {
        return 'text-danger font-weight-bolder';
    }
    if ($element == 'unapproved') {
        return 'badge badge-danger';
    }

    if ($element == 'inactive') {
        return 'badge badge-danger';
    }

}
