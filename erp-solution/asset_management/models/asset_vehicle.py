# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetVehicle(models.Model):
    _name = 'asset.vehicle'
    _description = 'Asset Vehicle Model'
    name = fields.Char('Vehicle Name')
    color = fields.Many2many('color')
    owner_id = fields.Many2one('res.partner', string='Owner')
    seller_id = fields.Many2one('res.partner', string='Seller')
    vehicle_type_id = fields.Many2one('asset.vehicle.type')
    state = fields.fields.Selection([
        ('inuse', 'In Use'),
        ('rent', 'Rent'),
        ('lease', 'Lease'),
        ('active', 'Active'),
        ('damaged', 'Damaged'),
        ('upgrade', 'Upgrade')
    ], string='State')
    picture = fields.Image('Vehicle Picture')
    date_of_purchase = fields.Date('Date of Purchase')
class AssetVehicleType(models.Model):
    _name = 'asset.vehicle.type'
    _description = 'Asset Vehicle Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
