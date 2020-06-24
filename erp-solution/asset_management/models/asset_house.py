# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetHouse(models.Model):
    _name = 'asset.house'
    _description = 'Asset House Model'
    name = fields.Char('Architecture Name')
    address = fields.Char('Address')
    country = fields.Many2one('country')
    city = fields.Many2one('city')
    color = fields.Many2many('color')
    owner_id = fields.Many2one('res.partner', string='Owner')
    seller_id = fields.Many2one('res.partner', string='Seller')
    house_type_id = fields.Many2one('asset.house.type')
    state = fields.Selection([
        ('inuse', 'In Use'),
        ('rent', 'Rent'),
        ('lease', 'Lease'),
        ('active', 'Active'),
        ('damaged', 'Damaged'),
        ('upgrade', 'Upgrade')
    ], string='State')
    picture = fields.Image('House Picture')
    established_day = fields.Date('Established Day')

class AssetHouseType(models.Model):
    _name = 'asset.house.type'
    _description = 'Asset House Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
  