# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetMachine(models.Model):
    _name = 'asset.machine'
    _description = 'Asset Machine Model'
    seri_number = fields.Char('Seri Number')
    color = fields.Many2many('color')
    picture = fields.Image('Machine Picture')
    state = fields.Selection([
        ('inuse', 'In Use'),
        ('rent', 'Rent'),
        ('lease', 'Lease'),
        ('active', 'Active'),
        ('damaged', 'Damaged'),
        ('liquidated', 'Liquidated'),
        ('upgrade', 'Upgrade')
    ], string='State')
    date_of_purchase = fields.Date()
    machine_type_id = fields.Many2one('asset.machine.type')
    supplier_id = fields.Many2one('res.partner', string='Supplier')
class AssetMachineType(models.Model):
    _name = 'asset.machine.type'
    _description = 'Asset Machine Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')


  