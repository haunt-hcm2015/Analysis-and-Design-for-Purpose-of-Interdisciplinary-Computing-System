# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetShips(models.Model):
    _name = 'asset.ships'
    _description = 'Asset Ships Model'
    name = fields.Char('Ship Name')
    color = fields.Many2many('color')
    owner_id = fields.Many2one('res.partner', string='Owner')
    seller_id = fields.Many2one('res.partner', string='Seller')
    ship_type_id = fields.Many2one('asset.ship.type')
    state = fields.fields.Selection([
        ('inuse', 'In Use'),
        ('rent', 'Rent'),
        ('lease', 'Lease'),
        ('active', 'Active'),
        ('damaged', 'Damaged'),
        ('upgrade', 'Upgrade')
    ], string='State')
    picture = fields.Image('House Picture')
    date_of_purchase = fields.Date('Date of Purchase')
class AssetShipType(models.Model):
    _name = 'asset.ship.type'
    _description = 'Asset Ship Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
  