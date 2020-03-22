# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetLand(models.Model):
    _name = 'asset.land'
    _description = 'Asset Land Model'
    land_number = fields.Char('Number of Land Use Rights')
    owner_id = fields.Many2one('res.partner', string='Owner')
    seller_id = fields.Many2one('res.partner', string='Seller')
    land_type_id = fields.Many2one('asset.land.type')
    country = fields.Many2one('country')
    city = fields.Many2one('city')
    address = fields.Char('Address')
    state = fields.fields.Selection([
        ('inuse', 'In Use'),
        ('rent', 'Rent'),
        ('lease', 'Lease')
    ], string='State')
    picture = fields.Image('Land Picture')
class AssetLandType(models.Model):
    _name = 'asset.land.type'
    _description = 'Asset Land Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')