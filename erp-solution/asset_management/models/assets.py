# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Asset(models.Model):
    _name               = 'asset.asset'
    _description        = 'Asset Model'
    asset_name          = fields.Char('Asset Name')
    asset_attribute     = fields.Char('Asset Attribute')
    year_of_manufacture = fields.Date('Year of Manufacture')
    year_of_use         = fields.Date('Year of Use')
    original_price      = fields.Float('Original Price')
    place_of_production = fields.Char('Place of Production')
    quantity            = fields.Float('Quantity')
    image_asset         = fields.Image('Image')
    state               = fields.Selection([
                            ('inuse', 'In Use'),
                            ('rent', 'Rent'),
                            ('lease', 'Lease'),
                            ('active', 'Active'),
                            ('lost', 'Lost'),
                            ('unused', 'Unused'),
                            ('loan', 'Loan'),
                            ('damaged', 'Damaged'),
                            ('liquidated', 'Liquidated'),
                        ], string='State of Asset:')
    asset_type_id       = fields.Many2one('asset.type', 'Asset Type')
class AssetType(models.Model):
    _name = 'asset.type'
    _description = 'Asset Type Model'
    type_name = fields.Char('Asset Type')
    asset_ids = fields.One2many('asset.asset', 'asset_type_id', 'Asset name') 









