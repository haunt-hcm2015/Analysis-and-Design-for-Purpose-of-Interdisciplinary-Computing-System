# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Supplier(models.Model):
    _name = 'accounting.supplier'
    _description = 'Accounting Supplier Model'
    name = fields.Char()
    supplier_address_ids = fields.One2many('accounting.supplier.address', 'supplier_id',string='Supplier Address')
    city = fields.Many2many('civil.status.city')
    supplier_name = fields.Char('Name')
    supplier_email = fields.Char('Email')
    supplier_email = fields.Char('Email')
    supplier_cellphone = fields.Char('Cellphone')
    supplier_phone = fields.Char('Phone')

class SupplierAddress(models.Model):
    _name = 'accounting.supplier.address'
    _description = 'Accounting Supplier Address Model'
    address_type_id = fields.Many2one('accounting.supplier.address.type',string='Address Type')
    supplier_id = fields.Many2one('accounting.supplier',string='Supplier')
    address_id = fields.Many2one('civil.status.address', string='Address')
class SupplierAddressType(models.Model):
    _name = 'accounting.supplier.address.type'
    _description = 'Accounting Supplier Address Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()